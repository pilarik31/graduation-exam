<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{


    public function index()
    {
        return view('auth.login');
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function login(Request $request)
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
     *
     * @return Response
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}