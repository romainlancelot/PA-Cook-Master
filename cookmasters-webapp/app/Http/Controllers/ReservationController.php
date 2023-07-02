<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    // Affiche le formulaire de création d'une nouvelle réservation pour une salle spécifique
    public function create(Room $room)
    {
        return view('reservations.create', [
            'room' => $room,
        ]);
    }

    // Stocke une nouvelle réservation dans la base de données
    public function store(Request $request, Room $room)
    {
        $request->validate([
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
        ]);

        // Vérifie si la salle est déjà réservée pour ces dates
        if ($room->reservations()->where(function ($query) use ($request) {
            $query->whereBetween('start_date', [$request->start_date, $request->end_date])
                ->orWhereBetween('end_date', [$request->start_date, $request->end_date]);
        })->exists()) {
            return back()->withErrors([
                'start_date' => 'La salle est déjà réservée pour ces dates.',
            ]);
        }

        // Crée une nouvelle réservation
        $reservation = new Reservation([
            'user_id' => auth()->id(),
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        // Associe la réservation à la salle et l'enregistre
        $room->reservations()->save($reservation);

        return redirect()->route('rooms.show', $room)->with('status', 'Réservation créée avec succès!');
    }
}
