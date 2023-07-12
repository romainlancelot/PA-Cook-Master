<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use Carbon\Carbon;

class RoomReservationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'name' => 'required|string',
            'email' => 'required|email',
            'phoneNumber' => 'required',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'number_of_people' => 'required|integer',
            'message' => 'nullable|string',
        ]);

        $room = Room::find($request->room_id);

        // verifie si le jours est dispo

        // $dateStart = Carbon::parse($request->start_date);
        // $dateEnd = Carbon::parse($request->end_date);
        // $availableDays = json_decode($room->availability_days);
        

        // dd($availableDays);
        // $currentDate = $dateStart;
        // while ($currentDate <= $dateEnd) {
        //     if (!in_array($currentDate->dayOfWeek, $availableDays)) {
        //         return redirect()->route('rooms.show', $room->id)
        //             ->with('success', 'Les dates sélectionnées ne sont pas toutes disponibles.');
        //     }
        //     $currentDate->addDay();
        // }
    
        // Vérifier si la chambre est disponible
        $isAvailable = $room->reservations()
        ->where(function ($query) use ($request) {
            $query->whereBetween('start_time', [$request->start_time, $request->end_time])
                ->orWhereBetween('end_time', [$request->start_time, $request->end_time])
                ->orWhere(function ($query) use ($request) {
                    $query->where('start_time', '<=', $request->start_time)
                        ->whereNull('end_time');
                });
        })
        ->doesntExist();
    
        
        if (!$isAvailable) {
            return redirect()->route('rooms.show', $room->id)
                ->with('success', 'La chambre n\'est pas disponible aux heures demandées.');
        }
        
        $reservation = $room->reservations()->create([
            'user_id' => $request->user()->id,
            'name' => $request->name,
            'email' => $request->email,
            'phoneNumber' => $request->phoneNumber,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'number_of_people' => $request->number_of_people,
            'message' => $request->message,
        ]);

        return redirect()->route('rooms.show', $room->id)
        ->with('success', 'La réservation a été créée avec succès.');
    }
}
