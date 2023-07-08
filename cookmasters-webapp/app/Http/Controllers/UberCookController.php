<?php

namespace App\Http\Controllers;

use App\Models\CookingRecipes;
use App\Models\Transactions;
use Illuminate\Http\Request;

class UberCookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ubercook.index')->with('recipes', CookingRecipes::where('deliverable', 1)->get());
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('ubercook.show')->with('recipe', CookingRecipes::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $created_at)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $created_at)
    {
        $validatedData = $request->validate([
            'canceled_at' => 'required|date',
        ]);
        try {
            if (!$transaction = Transactions::where('created_at', $created_at)->get()) {
                return redirect()->route('account.show')->withErrors(['error' => 'Transaction not found']);
            }
            $stripe = new StripeController();
            $stripe->expireCheckout(auth()->user()->stripe_id, $transaction[0]->stripe_payment_intent_id);
            $status = 'canceled_at';

            foreach ($transaction as $tr) {
                $tr->$status = now();
                $tr->save();
            }
            return redirect()->route('account.show')->with('success', 'Transaction canceled');
        } catch (\Throwable $th) {
            return redirect()->route('account.show')->withErrors(['error' => 'Error canceling transaction']);
        }
    }
}
