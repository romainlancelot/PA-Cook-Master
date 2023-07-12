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
        return $this->belongsTo(Courses::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function module()
    {
        return $this->belongsTo(CoursesModules::class);
    }
}
