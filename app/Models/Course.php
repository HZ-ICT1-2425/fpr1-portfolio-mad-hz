<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name', 'is_selected'];

    protected $casts = [
        'exams' => 'array',
        'is_selected' => 'boolean',
    ];
}
