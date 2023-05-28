<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function show() 
    {
        if (($stripe_id = auth()->user()->stripe_id) != null) {
            $stripe = new StripeController();
            $invoices = $stripe->retriveAllInvoices($stripe_id)->data;
            $invoices = array_reverse($invoices);
        }
        return view('auth.account')->with([
            'invoices' => $invoices ?? null,
        ]);
    }
}
