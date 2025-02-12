<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;

class DashboardController extends Controller implements HasMiddleware
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
     * Show the dashboard
     * With selected courses
     * And the sum of the credits
     *
     * @return DashboardView
     */
    public function __invoke()
    {
        $courses = Course::get()->groupBy('quarter');
        $totalEc = Course::where('is_selected', true)->sum('ec');

        return view('dashboard', [
            'courses' => $courses,
            'totalEc' => $totalEc,
        ]);
    }

    /**
     * Toggle between if the course is selected or not
     * Update credits sum
     *
     * @return json
     */
    public function toggle(Course $course)
    {
        $course->update(['is_selected' => !$course->is_selected]);
        $totalEc = Course::where('is_selected', true)->sum('ec');

        return response()->json([
            'success' => true,
            'totalEc' => $totalEc,
        ]);
    }
}
