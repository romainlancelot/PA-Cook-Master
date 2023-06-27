<?php

namespace App\Http\Controllers;

use App\Events\ConversationsEvent;
use App\Models\Conversations;
use Illuminate\Http\Request;

class ConversationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $conversations = Conversations::where('to_id', null)->get();
        return view('conversations.index')->with('conversations', $conversations);
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
        $validatedData = $request->validate([
            'message' => 'required|string',
            'to_id' => 'nullable|integer',
        ]);
        $validatedData['from_id'] = auth()->user()->id;
        $conversation = Conversations::create($validatedData);

        event(new ConversationsEvent($conversation));

        return response()->json(['success' => 'Message sent successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
