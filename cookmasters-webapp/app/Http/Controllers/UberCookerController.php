<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use PDF;
use Illuminate\Http\Request;

class UberCookerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaction = Transactions::where('in_delivery', null)
            ->where('equipment_id', null)
            ->groupBy('created_at')
            ->orderBy('created_at', 'desc')
            ->get();
        
        $arr = [];
        foreach ($transaction as $key => $value) {
            $tr = Transactions::where('created_at', $value->created_at)->get();
            foreach ($tr as $k => $v) {
                $arr[$key][] = $v;
            }
        }
        
        return view('ubercooker.index')->with(
            'transactions', $arr
        );
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
            'accepted_at' => 'nullable|date',
            'in_preparation' => 'nullable|date',
        ]);
        try {
            if (!$transaction = Transactions::where('created_at', $created_at)->get()) {
                return redirect()->route('ubercooker.index')->withErrors(['error' => 'Transaction not found']);
            }
            if (isset($validatedData['accepted_at'])) { $status = 'accepted_at'; }
            if (isset($validatedData['in_preparation'])) { $status = 'in_preparation'; }
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

    /**
     * Download ticket to put in the order.
     */
    public function dlTicket(string $created_at)
    {
        try {
            if (!$transaction = Transactions::where('created_at', $created_at)->get()) {
                return redirect()->route('ubercooker.index')->withErrors(['error' => 'Transaction not found']);
            }
            
            $subtotal = 0;
            foreach ($transaction as $tr) {
                $subtotal += $tr->price;
            }

            $pdf = PDF::setOptions([
                'dpi' => 150,
                'defaultFont' => 'sans-serif',
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true,
                'isPhpEnabled' => true,
                'isJavascriptEnabled' => true,
            ]);

            $pdf->loadView('PDF.ticket', [
                'transaction' => $transaction,
                'subtotal' => $subtotal,
            ])->setPaper([0, 0, 234, 594], 'portrait');

            return $pdf->download('ticket.pdf');
        } catch (\Throwable $th) {
            return redirect()->route('ubercooker.index')->withErrors(['error' => 'Error downloading ticket']);
        }
    }
}
