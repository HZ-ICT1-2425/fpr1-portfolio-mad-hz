<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Shows the contact page
     * @return ContactView
     */
    public function __invoke()
    {
        return view('contact');
    }
}
