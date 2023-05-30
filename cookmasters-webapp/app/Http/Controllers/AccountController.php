<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function show() 
    {
        if (($stripe_id = auth()->user()->stripe_id) != null) {
            $stripe = new StripeController();
            $payments = $stripe->retriveAllPaymentIntentAndInvoices($stripe_id);

            if (auth()->user()->subscriptionPlan()->first()->price > 0) {
                $subscription = $stripe->retriveSubscription($stripe_id);
            }

        }
        return view('auth.account')->with([
            'payments' => $payments ?? null,
            'subscription' => $subscription ?? null,
        ]);
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $user->update($request->all());

        if ($user->stripe_id != null) {
            $stripe = new StripeController();
            $stripe->updateCustomer($user);
        }

        return redirect()->back()->with('success', 'Your account has been updated');
    }
}
