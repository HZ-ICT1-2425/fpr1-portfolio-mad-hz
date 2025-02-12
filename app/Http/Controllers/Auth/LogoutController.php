<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Responses\Auth\LogoutResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;

class LogoutController extends Controller implements HasMiddleware
{
    /**
     * Auth middleware
     */
    public static function middleware(): array
    {
        return [
            'auth',
        ];
    }

    /**
     * Logouts the authenticated user
     *
     * @return LogoutResponse
     */
    public function __invoke()
    {
        auth()->logout();

        return new LogoutResponse;
    }
}
