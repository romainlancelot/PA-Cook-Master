<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all rooms from the database
        $rooms = Room::all();

        // Redirect to the index view
        return view('rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rooms.create');       
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'is_active' => 'boolean',
            'address' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
            'country' => 'required',
            'description' => 'required',
            'capacity' => 'required|integer',
            'price' => 'required|numeric',
            'type' => 'required',
            'surface' => 'numeric',
            'availability_days' => 'nullable',
            'minimum_reservation_hours' => 'numeric',
            'allow_more_people' => 'boolean',
            'max_people' => 'numeric',
            'caution' => 'numeric',
            'photos' => 'nullable|array',
            'photos.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
    
        if($request->hasfile('photos'))
        {
            foreach($request->file('photos') as $file)
            {
                $name = time().'_'.$file->getClientOriginalName();
                $file->storeAs('public/rooms', $name);  
                $data[] = $name;  
            }
        }
    
        $validatedData['photos'] = json_encode($data);
        
        // assign user_id to the authenticated user
        $validatedData['user_id'] = auth()->user()->id;
        
        $room = Room::create($validatedData);
    
        return redirect()->route('rooms.index')->with('success', 'Room created successfully');
    }
        
    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        // $reservations = $room->reservations()->orderBy('start_date')->get();

        return view('rooms.show', [
            'room' => $room,
            // 'reservations' => $reservations,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        return view('rooms.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoomRequest $request, Room $room)
    {
        $room->update($request->all());

        return redirect()->route('boutique.index')->with('success', 'Room updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        $room->delete();

        return redirect()->route('boutique.index')->with('success', 'Room deleted successfully');
    }
}
