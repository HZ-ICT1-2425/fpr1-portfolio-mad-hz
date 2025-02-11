<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Responses\Auth\LoginResponse;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Shows the login page view
     * @return LoginView
     */
    public function __invoke()
    {
        return view('auth.login');
    }

    /**
     * Proccess the login request
     * Validates the inputs through LoginRequest
     * @return LoginResponse
     */
    public function store(LoginRequest $request)
    {
        if (!auth()->attempt($request->only('email', 'password'))) {
            return back()->withInput()->with('message', 'Either your email or password is invalid.');
        }

        return new LoginResponse;
        // Login Test
    }
}
