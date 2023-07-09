<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workshop;

class WorkshopController extends Controller
{
    public function index()
    {
        $workshops = Workshop::all();
        return view('workshops.index', compact('workshops'));
    }

    public function create()
    {
        return view('workshops.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'price' => 'required',
            'duration' => 'required',
            'photos' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('photos')) {
            $path = $request->file('photos')->store('photoss', 'public');
            $validated['photos'] = $path;
        }

        $workshop = Workshop::create($validated);

        return redirect()->route('workshops.show', $workshop);
    }

    public function show(Workshop $workshop)
    {
        return view('workshops.show', compact('workshop'));
    }

    public function edit(Workshop $workshop)
    {
        return view('workshops.edit', compact('workshop'));
    }

    public function update(Request $request, Workshop $workshop)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'price' => 'required',
            'duration' => 'required',
            'photos' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('photos')) {
            $path = $request->file('photos')->store('photoss', 'public');
            $validated['photos'] = $path;
        }

        $workshop->update($validated);

        return redirect()->route('workshops.show', $workshop);
    }

    public function destroy(Workshop $workshop)
    {
        $workshop->delete();

        return redirect()->route('workshops.index');
    }
}
