<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoomOfferRequest;
use App\Http\Requests\UpdateRoomOfferRequest;
use App\Models\RoomOffer;

class RoomOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roomoffers = RoomOffer::all();
        return view('roomoffers.index', compact('roomoffers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roomoffers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoomOfferRequest $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'availabilities' => 'required',
            'duration' => 'required',
            'price' => 'required',
        ]);
        $equipment = RoomOffer::create($validatedData);
        return redirect()->route('roomoffers.index')->with('success', 'RoomOffer created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(RoomOffer $roomoffer)
    {
        return view('roomoffers.show', compact('roomoffer'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RoomOffer $roomoffer)
    {
        return view('roomoffers.edit', compact('roomoffer'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoomOfferRequest $request, RoomOffer $roomoffer)
    {
        $roomoffer->update($request->all());
        return redirect()->route('roomoffers.index')->with('success', 'RoomOffer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RoomOffer $roomoffer)
    {
        $roomoffer->delete();
        return redirect()->route('roomoffers.index')->with('success', 'RoomOffer deleted successfully');

    }
}
