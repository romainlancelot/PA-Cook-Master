<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoomEquipmentRequest;
use App\Http\Requests\UpdateRoomEquipmentRequest;
use App\Models\Equipment;
use App\Models\Room;
use App\Models\RoomEquipment;

class RoomEquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        // Retrieve all rooms from the database
        $rooms = Room::all();
        $equipments = Equipment::all();
        // Redirect to the index view
        return view('roomequipments.index', compact('rooms', 'equipments'));
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
    public function store(StoreRoomEquipmentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(RoomEquipment $roomEquipment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RoomEquipment $roomEquipment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoomEquipmentRequest $request, RoomEquipment $roomEquipment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RoomEquipment $roomEquipment)
    {
        //
    }
}
