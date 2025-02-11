<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class CourseService
{
    /**
     * Get the quarters and courses data from the JSON file.
     *
     * @return array
     */
    public function getQuartersWithCourses()
    {
        $json = Storage::disk('public')->get('courses.json');
        return json_decode($json, true);
    }

    /**
     * Calculate the total credits of selected courses.
     *
     * @param array $selectedCourses
     * @param array $quarters
     * @return float
     */
    public function calculateTotalCredits(array $selectedCourses, array $quarters)
    {
        $totalCredits = 0;

        foreach ($quarters as $quarter) {
            foreach ($quarter['courses'] as $course) {
                if (in_array($course['name'], $selectedCourses)) {
                    $totalCredits += $course['ec'];
                }
            }
        }

        return $totalCredits;
    }
}
