<?php

namespace App\Http\Controllers;

use App\Models\CookingRecipes;
use Illuminate\Http\Request;

class UberCookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ubercook.index')->with('recipes', CookingRecipes::where('deliverable', 1)->get());
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
        return view('ubercook.show')->with('recipe', CookingRecipes::find($id));
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
}
