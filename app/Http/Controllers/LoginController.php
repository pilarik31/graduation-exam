<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Laravel\Socialite\Contracts\User;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    protected array $providers = [
        'github',
    ];

    public function index(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an authentication attempt.
     */
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ],[
            'email.required' => __('validation.email.empty'),
            'password.required' => __('validation.password.empty'),
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->intended()->with('success', __('auth.success'));
        } else {
            return back()->with('error', __('auth.failed'));
        }
    }

    protected function loginOAuth(User $providerUser, string $driver)
    {
        /** @var Client */
        $user = Client::where('email', $providerUser->getEmail())->first();

        if ($user) {
            $user->update([
                'provider' => $driver,
                'provider_id' => $providerUser->getId(),
                'access_token' => $providerUser->token
            ]);

            Auth::login($user, true);
            return $this->sendSuccessResponse();
        }
        $this->sendFailedResponse();
    }

    public function redirectToProvider($driver): RedirectResponse
    {
        if (!$this->isProviderAllowed($driver)) {
            return $this->sendFailedResponse("{$driver} is currently not supported.");
        }

        try {
            return Socialite::driver($driver)->redirect();
        } catch (Exception $e) {
            return $this->sendFailedResponse($e->getMessage());
        }
    }

    public function handleProviderCallback(string $driver)
    {
        try {
            $user = Socialite::driver($driver)->user();
        } catch (Exception $e) {
            return $this->sendFailedResponse($e->getMessage());
        }

        return empty($user->getEmail())
            ? $this->sendFailedResponse("No email id returned from {$driver} provider.")
            : $this->loginOAuth($user, $driver);
    }

    /**
     * Handle a logout.
     */
    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('login');
    }

    protected function sendSuccessResponse(): RedirectResponse
    {
        return redirect()->intended();
    }

    protected function sendFailedResponse(?string $msg = null): RedirectResponse
    {
        return redirect()->route('login')->with(
            'error',
            $msg ?: 'Unable to login, try another authentication method.'
        );
    }

    private function isProviderAllowed(string $driver): bool
    {
        return in_array($driver, $this->providers, true) && config()->has("services.{$driver}");
    }
}
