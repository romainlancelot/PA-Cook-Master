<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
            'number_of_people' => 'required|integer|min:1',
            'total_price' => 'required|integer|min:0', // le prix total ne peut pas être négatif
            'status' => 'required|string|in:pending,confirmed,cancelled', // statut doit être l'une de ces valeurs
            'notes' => 'nullable|string',
            'discount' => 'nullable|integer|min:0', // la remise ne peut pas être négative
            'payment_intent_id' => 'nullable|string', // peut être null si le paiement n'a pas encore été effectué
            'payment_status' => 'nullable|string|in:pending,paid,failed', // doit être l'un de ces valeurs ou null
            'payment_receipt_url' => 'nullable|url', // doit être une URL valide ou null
            'payment_date' => 'nullable|date', // peut être null si le paiement n'a pas encore été effectué
            'cancelled_at' => 'nullable|date', // peut être null si la réservation n'a pas été annulée
            'message' => 'nullable|string', // peut être null si aucun message n'a été ajouté
            'is_read' => 'boolean', // doit être vrai ou faux
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
            'number_of_people' => $request->number_of_people,
            'message' => $request->message,
            'is_read' => false,
        ]);

        // Associe la réservation à la salle et l'enregistre
        $room->reservations()->save($reservation);

        return redirect()->route('rooms.show', $room)->with('status', 'Réservation créée avec succès!');
    }
}
