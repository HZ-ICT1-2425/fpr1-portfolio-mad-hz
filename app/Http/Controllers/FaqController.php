<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Shows the faq view
     * @return FaqView
     */
    public function __invoke()
    {
        return view('faq');
    }


}
