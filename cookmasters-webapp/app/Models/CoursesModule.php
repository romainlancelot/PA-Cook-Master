<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursesModule extends Model
{
    use HasFactory;

    protected $table = 'courses_module';

    protected $fillable = [
        'name',
        'course_id',
        'previous_module_id',
        'next_module_id',
        'duration',
        'video',
        'introduction',
        'description',
        'conclusion'
    ];

    public function course()
    {
        return $this->belongsTo(Courses::class);
    }
}
