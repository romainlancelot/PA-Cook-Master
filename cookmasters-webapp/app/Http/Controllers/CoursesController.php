<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\CoursesModule;
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
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
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


    /**
     * Display the specified module.
     * 
     * @param string $id
     * @param string $module_id
     */
    public function module(string $id, string $module_id)
    {
        $course = Courses::find($id);
        $module = $course->modules()->find($module_id);

        $courses_regristrations = CoursesRegistrations::where('courses_id', $course->id)
            ->where('user_id', auth()->user()->id)
            ->first();

        $modules = $course->modules;
        $firstModule = $modules->where('previous_module_id', null)
            ->where('courses_id', $course->id)
            ->first();
        $authorizedId = [];

        $nextModule = $firstModule;
        while ($firstModule) {
            $authorizedId[] = $firstModule->id;
            $firstModule = $modules->where('id', $firstModule->next_module_id)->first();
            if (!$firstModule) {
                break;
            }
        }

        if (!in_array($module_id, $authorizedId)) {
            return redirect()->route('courses.module', [$course->id, $nextModule->id])->withErrors(['error' => 'You have not completed the previous modules.']);
        }

        return view('courses.module')->with([
            'course' => $course,
            'module' => $module,
            'courses_regristrations' => $courses_regristrations,
        ]);
    }


    /**
     * Validate the specified module.
     * 
     * @param \Illuminate\Http\Request $request
     */
    public function validateModule(Request $request)
    {
        $validatedDated = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'module_id' => 'required|exists:courses_module,id',
        ]);

        $courses_regristrations = CoursesRegistrations::where('courses_id', $validatedDated['course_id'])
            ->where('user_id', auth()->user()->id)
            ->first();
            
        $course = Courses::find($validatedDated['course_id']);
        $module = $course->modules()->find($validatedDated['module_id']);

        if (!$courses_regristrations) {
            return redirect()->route('courses.show', $course->id)->withErrors(['error' => 'You are not registered to this course.']);
        }

        if (!$module) {
            return redirect()->route('courses.show', $course->id)->withErrors(['error' => 'Module not found.']);
        }

        dd($module->nextModule($course));
        $courses_regristrations->update([
            'courses_module_id' => $module->id,
        ]);

        return redirect()->route('courses.module', [$course->id, $module->nextModule($course)])->with('success', 'Module validated.');
    }
}
