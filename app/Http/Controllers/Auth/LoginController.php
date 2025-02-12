<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Responses\Auth\LoginResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;

class LoginController extends Controller implements HasMiddleware
{
    /**
     * Guest middleware
     */
    public static function middleware(): array
    {
        return [
            'guest',
        ];
    }

    /**
     * Shows the login page view
     *
     * @return LoginView
     */
    public function __invoke()
    {
        return view('auth.login');
    }

    /**
     * Proccess the login request
     * Validates the inputs through LoginRequest
     *
     * @param LoginRequest $request
     * @return LoginResponse
     */
    public function store(LoginRequest $request)
    {
        if (!auth()->attempt($request->only('email', 'password'))) {
            return back()->withInput()->with('message', 'Either your email or password is invalid.');
        }

        return new LoginResponse;
    }
}
