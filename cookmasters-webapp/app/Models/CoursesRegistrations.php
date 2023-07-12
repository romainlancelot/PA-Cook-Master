<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursesRegistrations extends Model
{
    use HasFactory;

    protected $table = 'courses_registrations';

    protected $fillable = [
        'courses_id',
        'user_id',
        'courses_module_id',
    ];

    public function course()
    {
        return $this->belongsTo(Courses::class, 'courses_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function module()
    {
        return $this->belongsTo(CoursesModules::class);
    }

    public function progression()
    {
        if (!$this->courses_module_id) {
            return 0;
        }

        $course = Courses::find($this->courses_id);
        $modules = $course->modules;
        $firstModule = $modules->where('previous_module_id', null)->first();
        $total = count($modules);
        $completed = 1;

        while ($firstModule->next_module_id && $firstModule->id != $this->courses_module_id) {
            $firstModule = $modules->where('id', $firstModule->next_module_id)->first();
            $completed++;
        }

        return $completed / $total * 100;
    }
}
