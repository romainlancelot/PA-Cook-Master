<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'currentPassword' => 'required',
            'newPassword' => 'required|min:8',
            'newPasswordConfirmation' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        if ($request->newPassword != $request->newPasswordConfirmation) {
            return redirect()->back()->withErrors(['newPassword' => 'The new password confirmation does not match']);
        }

        $user = auth()->user();
        if (!password_verify($request->currentPassword, $user->password)) {
            return redirect()->back()->withErrors(['currentPassword' => 'The current password does not match']);
        }

        $user->password = $request->newPassword;
        $user->save();

        $user->tokens()->delete();
        auth()->logout();

        return redirect()->route('login.show')->with('success', 'Your password has been updated');
    }
}
