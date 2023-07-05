<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentsRequest;
use App\Http\Requests\UpdateCommentsRequest;
use App\Models\Comments;
use Illuminate\Http\Request;
use App\Models\Equipment;

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
    public function store(Equipment $equipment, equest $request)
    {
        dd($equipment);
        $request->validate([
            'body' => 'required',
            'rating' => 'required|integer|min:1|max:5', // Assurez-vous que la note est un entier entre 1 et 5
        ]);
    
        $equipment->comments()->create([
            'user_id' => auth()->id(),
            'body' => $request->body,
            'rating' => $request->rating, // Ajoutez cette ligne pour la notation par étoiles
        ]);
        return back();
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
