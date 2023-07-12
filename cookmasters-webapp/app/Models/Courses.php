<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;

    protected $table = 'courses';

    protected $fillable = [
        'name',
        'description',
        'difficulty'
    ];

    public function modules()
    {
        return $this->hasMany(CoursesModule::class);
    }

    public function duration()
    {
        $duration = 0;
        foreach ($this->modules as $module) {
            $duration += strtotime($module->duration) - strtotime('00:00:00');
        }
        return gmdate('H:i:s', $duration);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'courses_registrations');
    }

    public function registered()
    {
        return $this->hasMany(CoursesRegistrations::class)->where('user_id', auth()->user()->id)->exists();
    }

    public function registeredModules()
    {
        return $this->hasMany(CoursesRegistrations::class)->where('user_id', auth()->user()->id)->get();
    }

    public function currentModule(Courses $course)
    {
        $status = $this->hasMany(CoursesRegistrations::class)
            ->where('user_id', auth()->user()->id)
            ->where('courses_id', $course->id)
            ->whereNotNull('courses_module_id')
            ->first();

        if ($status == null) {
            return $course->modules->where('previous_module_id', null)->first()->id;
        }

        return $status->courses_module_id;
    }

    public function lastModule()
    {
        return CoursesModule::where('courses_id', $this->id)
            ->where('next_module_id', null)
            ->first()
            ->id;
    }
}
