<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubscriptionPlansController extends Controller
{
    public function index()
    {
        $subscription_plans = DB::table('subscription_plans')->get();
        return view('subscription-plans.index')->with('subscription_plans', $subscription_plans);
    }
}
