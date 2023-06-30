<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class OneSignalController extends Controller
{
    public function getPlayerId(Request $request)
    {
        $validatedData = $request->validate([
            'player_id' => 'required|string',
        ]);

        $user = User::where('player_id', $validatedData['player_id'])->first();

        if ($user) {
            return response()->json([
                'success' => false,
                'message' => 'Player ID not found.',
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Player ID found.',
        ]);

    }
    public function savePlayerId(Request $request)
    {
        $validatedData = $request->validate([
            'player_id' => 'required|string',
        ]);

        User::where('id', auth()->user()->id)->update([
            'one_signal_id' => $validatedData['player_id'],
        ]);

        return response()->json([
            'message' => 'Player ID saved successfully.',
        ]);
    }
}
