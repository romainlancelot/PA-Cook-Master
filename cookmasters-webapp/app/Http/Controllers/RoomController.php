<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{

    function checkRoomData($room) {
        if (!$room) {
            return false;
        }
    
        if (!$room->id || !$room->photos || !$room->price || !$room->address || !$room->postal_code || !$room->city || !$room->name || !$room->capacity || !$room->surface || !$room->type || !$room->description || !$room->minimum_reservation_hours || !$room->allow_more_people || !$room->caution || !$room->activities || !$room->facilities || !$room->rules) {
            return false;
        }

        return true;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Room::query()->where('is_active', 1);

        $filers = 0;
        
        if ($request->has('address')) {
            if ($request->has('address') != '' && $request->has('address') != 'où ?'){
                $query->where('address', $request->input('address'));
                $filers = 1;
            }
        }
    
        if ($request->has('price_min') && $request->has('price_max')) {
            if ($request->price_min != '' && $request->price_max != '') {
                $query->whereBetween('price', [$request->price_min, $request->price_max]);
                $filers = 1;
            }
        }
        if ($request->has('price_min') && $request->price_min != '') {
            $query->where('price', '>=', $request->price_min);
            $filers = 1;
           }

        if ($filers == 0) {
            $rooms = Room::all()->where('is_active', 1);
        } else {
            $rooms = $query->get();
        }

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
            'address' => 'required',
            'description' => 'required',
            'capacity' => 'required|integer',
            'price' => 'required|numeric',
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
    
        return redirect()->route('rooms.index')->with('success', 'Votre salle a bien été créée !, veuillez compléter les informations de votre salle');
    }
        
    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        if (!$this->checkRoomData($room)) {
            return redirect()->route('rooms.index')->with('success', 'Inscription non terminée Veillez completer les informations de votre salle');
        }
        $reservations = $room->reservations()
            ->select('start_time AS start', 'end_time AS end')
            ->get()
            ->toArray();
        
        $availability_hours = "";
        $roomhours = json_decode($room->reservation_hours);
        for ($i = 0; $i !=  count($roomhours); $i++) {
            $availability_hours = $availability_hours . $roomhours[$i] . "h ";
        }
        $roomdays = json_decode($room->availability_days);
        $availability_days = "C'est ouvert ";
        if (empty(array_diff((array)[1,2,3,4,5,6,7], $roomdays))) {
            $availability_days = "Tous les jours !";
        } else if (empty(array_diff((array)[1,2,3,4,5], $roomdays))) {
            $availability_days = "Du lundi au vendredi !";
        } else {
            for ($i = 0; $i !=  count($roomdays); $i++) {
                if ($roomdays[$i] == 1) {
                    $availability_days = $availability_days . "Lundi";
                }
                if ($roomdays[$i] == 2) {
                    $availability_days = $availability_days . " Mardi";
                }
                if ($roomdays[$i] == 3) {
                    $availability_days = $availability_days . " Mercredi";
                }
                if ($roomdays[$i] == 4) {
                    $availability_days = $availability_days . " Jeudi";
                }
                if ($roomdays[$i] == 5) {
                    $availability_days = $availability_days . " Vendredi";
                }
                if ($roomdays[$i] == 6) {
                    $availability_days = $availability_days . " Samedi";
                }
                if ($roomdays[$i] == 7) {
                    $availability_days = $availability_days . " Dimanche";
                }
            }
        }

        return view('rooms.show', ['room' => $room, 'reservations' => $reservations, "days" => $availability_days, "hours" => $availability_hours]);
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

        return redirect()->route('rooms.index')->with('success', 'Room updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        $room->delete();

        return redirect()->route('admin.rooms')->with('success', 'Room deleted successfully');
    }
}
