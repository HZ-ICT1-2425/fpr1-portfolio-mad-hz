<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the home page
     *
     * @return HomeView
     */
    public function __invoke()
    {
        return view('home');
    }
}
