<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\SelectedCourse;
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
        $courses = Course::get()->groupBy('quarter');

        return view('dashboard', [
            'courses' => $courses,
        ]);
    }

    public function toggle(Course $course)
    {
        $course->update(['is_selected' => !$course->is_selected]);
        return response()->json(['success' => true]);
    }
}
