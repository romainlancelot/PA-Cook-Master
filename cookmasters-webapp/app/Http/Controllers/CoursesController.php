<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\CoursesRegistrations;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('courses.index')->with([
            'courses' => Courses::all(),
            'registered' => CoursesRegistrations::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('courses.show')->with('course', Courses::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Subscribe the user to the course.
     */
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'course_id' => 'required|exists:courses,id',
        ]);
        $course = Courses::find($validatedData['course_id']);
        if ($course->registered(auth()->user())) {
            return redirect()->route('courses.show', $course->id)->withErrors(['error' => 'You are already registered to this course.']);
        }
        CoursesRegistrations::create([
            'courses_id' => $course->id,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('courses.show', $course->id)->with('success', 'You have been registered to the course.');
    }

    public function module(string $id, string $module_id)
    {
        $course = Courses::find($id);
        $module = $course->modules()->find($module_id);

        return view('courses.module')->with([
            'course' => $course,
            'module' => $module,
        ]);
    }
}
