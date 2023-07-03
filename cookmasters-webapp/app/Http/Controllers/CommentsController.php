<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentsRequest;
use App\Http\Requests\UpdateCommentsRequest;
use App\Models\Comments;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
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
    public function store_room(Room $room, Request $request)
    {
        $comment = new Comments();
        $comment->service_id = $room->id;
        $comment->content = $request->input('content');
        $comment->save();
    
        return redirect()->back()->with('success', 'Comment added successfully');
    }
    
    public function store_equipment(Equipment $equipment, Request $request)
    {
        $comment = new Comments();
        $comment->service_id = $equipment->id;
        $comment->content = $request->input('content');
        $comment->save();
    
        return redirect()->back()->with('success', 'Comment added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comments $comments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comments $comments)
    {
        
        $comments->delete();
        return redirect()->route('boutiques.index')->with('success', 'Comments deleted successfully');
    }
}
