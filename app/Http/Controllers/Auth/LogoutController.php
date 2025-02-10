<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Responses\Auth\LogoutResponse;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    /**
     * Logouts the authenticated user
     * @return LogoutResponse
     */
    public function __invoke()
    {
        auth()->logout();

        return new LogoutResponse;
    }
}
