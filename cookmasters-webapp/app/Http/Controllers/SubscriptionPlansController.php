<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubscriptionPlans;
use App\Models\SubscriptionPlansFeatures;
use Illuminate\Support\Facades\DB;

class SubscriptionPlansController extends Controller
{
    public function index()
    {
        return view('subscription-plans.index')->with([
            'subscriptionPlans' => SubscriptionPlans::all()->sortBy('price'),
            'features' => SubscriptionPlansFeatures::all()
        ]);
    }   
}
