<?php

namespace App\Http\Controllers;

use App\Models\SelectedCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    /**
     * Show the dashboard
     *
     * @return DashboardView
     */
    public function __invoke()
    {
        $json = Storage::disk('public')->get('courses.json');
        $quarters = json_decode($json, true);

        return view('dashboard', [
            'quarters' => $quarters,
        ]);
    }
}
