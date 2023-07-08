<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use Illuminate\Http\Request;
use Stripe\Stripe;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaction = Transactions::where('delivered_at', null)
            ->where('in_preparation', '!=', null)
            ->where('equipment_id', null)
            ->groupBy('created_at')
            ->orderBy('created_at', 'desc')
            ->get();

        $stripe = new StripeController();

        $arr = [];
        foreach ($transaction as $key => $value) {
            $tr = Transactions::where('created_at', $value->created_at)->get();
            foreach ($tr as $k => $v) {
                $v->address = $stripe->retriveDeliveryAddress($v->stripe_payment_intent_id);
                $v->phone = $stripe->retriveDeliveryPhone($v->stripe_payment_intent_id);
                $arr[$key][] = $v;
            }
        }

        return view('driver.index')->with('transactions', $arr);
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
        //
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
        $validatedData = $request->validate([
            'in_delivery' => 'nullable|date',
            'delivered_at' => 'nullable|date',
        ]);
        try {
            if (!$transaction = Transactions::where('created_at', $created_at)->get()) {
                return redirect()->route('ubercooker.index')->withErrors(['error' => 'Transaction not found']);
            }
            if (isset($validatedData['in_delivery'])) { $status = 'in_delivery'; }
            if (isset($validatedData['delivered_at'])) { $status = 'delivered_at'; }
            foreach ($transaction as $tr) {
                $tr->$status = now();
                $tr->save();
            }
            return redirect()->route('ubercooker.index')->with('success', 'Transaction accepted');
        } catch (\Throwable $th) {
            return redirect()->route('ubercooker.index')->withErrors(['error' => 'Error accepting transaction']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
