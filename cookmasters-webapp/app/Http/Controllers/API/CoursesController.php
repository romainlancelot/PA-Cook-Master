<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use App\Models\CoursesRegistrations;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function index(Request $request)
    {

        $courses = Courses::all();
        $started_courses = CoursesRegistrations::where('user_id', $request->user->id)->get();

        foreach ($courses as $key => $value) {
            $courses[$key]['registered'] = $started_courses->where('courses_id', $value->id)->count() > 0;
            $courses[$key]['duration'] = $value->duration();
            $courses[$key]['modules'] = $value->modules;
        }

        return response()->json([
            'success' => true,
            'message' => 'Courses List',
            'data' => [

                'courses' => $courses,
            ]
        ]);
    }
}
