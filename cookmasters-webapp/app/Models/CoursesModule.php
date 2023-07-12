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
        'courses_id',
        'previous_module_id',
        'next_module_id',
        'duration',
        'video',
        'introduction',
        'description',
        'conclusion'
    ];

    protected $casts = [
        'duration' => 'datetime:H:i:s'
    ];

    public function course()
    {
        return $this->belongsTo(Courses::class);
    }

    public function previousModule(Courses $course)
    {
        // get where next_module = current_module_id and courses_id = course_id 
        $previous = CoursesModule::where('next_module_id', $this->id)
            ->where('courses_id', $course->id)
            ->first();
        
        return $previous != null ? $previous->id : $this->id;
    }

    public function nextModule(Courses $course)
    {
        // get where previous_module = current_module_id and courses_id = course_id 
        $next = CoursesModule::where('previous_module_id', $this->id)
            ->where('courses_id', $course->id)
            ->first();
        
        return $next != null ? $next->id : $this->id;

    }
}
