<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Shows the contact page
     * @return ProfileView
     */
    public function __invoke()
    {
        return view('profile');
    }
}
