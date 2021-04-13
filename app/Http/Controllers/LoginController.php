<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{

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

    /**
     * Handle a logout.
     */
    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
