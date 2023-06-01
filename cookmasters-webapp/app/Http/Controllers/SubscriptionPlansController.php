<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\SubscriptionPlans;
use Illuminate\Support\Facades\DB;
use App\Models\SubscriptionPlansFeatures;

class SubscriptionPlansController extends Controller
{
    public function index()
    {
        return view('subscription-plans.index')->with([
            'subscriptionPlans' => SubscriptionPlans::all()->sortBy('price'),
            'features' => SubscriptionPlansFeatures::all()
        ]);
    }

    public function subscribe($user_id, $plan_id)
    {
        $subscriptionPlan = SubscriptionPlans::find($plan_id);
        $user = User::find($user_id);
        if (!$subscriptionPlan) {
            return redirect()->back()->with('error', 'Subscription plan not found.');
        }

        // redirect stripe payment
        if ($subscriptionPlan->stripe_id != null && $subscriptionPlan->stripe_plan != null) {
            $stripe = new StripeController();
            return $stripe->subscribeToPlan($subscriptionPlan, $user);
        }
        
        return redirect()->back()->withErrors(['error' => 'Stripe subscription plan not found.']);
    }

    public function checkSubscription(Request $request)
    {
        try {
            $stripe = new StripeController();
            if (!($session = $stripe->retriveSession($request->session_id))) {
                return redirect()->back()->withErrors(['error' => 'Stripe session not found please contact support.']);
            }

            if (!($user = User::where('stripe_id', $session->customer)->first())) {
                return redirect()->back()->withErrors(['error' => 'User not found please contact support.']);
            }

            $invoice = $stripe->retriveInvoice($session->invoice);
            
            User::where('stripe_id', $session->customer)->update([
                'subscription_plan_id' => SubscriptionPlans::where('stripe_id', $invoice->lines->data[0]->plan->id)->first()->id
            ]);
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

        return redirect(route('subscription-plans.index'))->with('success', 'Subscription plan changed.');
    }

    public function unsubscribe($user_id)
    {
        $user = User::find($user_id);
        if (!$user) {
            return redirect()->back()->withErrors(['error' => 'User not found.']);
        }

        try {
            $stripe = new StripeController();
            $stripe->unsubscribeToPlan($user);
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

        $user->subscription_plan_id = SubscriptionPlans::where('price', 0)->first()->id;
        $user->save();

        return redirect()->back()->with('success', 'Subscription plan canceled.');
    }
}
