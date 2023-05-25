<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\SubscriptionPlans;
use Illuminate\Support\Facades\DB;
use App\Models\SubscriptionPlansFeatures;

class AdminController extends Controller
{
    /**
     * Display admin dashboard.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }

    /**
     * Display and manage users.
     * 
     * @return \Illuminate\Http\Response
     */
    public function users()
    {
        return view('admin.users')->with('users', User::all());
    }

    public function updateUser(Request $request, $id)
    {
        if (!User::find($id)) {
            return redirect()->back()->with('error', 'User not found.');
        }
        $validatedData = [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,'.$request->id,
            'email' => 'required|string|email|max:255|unique:users,email,'.$request->id,
            'role' => 'required|in:admin,user',
        ];
        $request->validate($validatedData);
        $user = User::find($request->id);
        $change_count = 0;

        foreach ($request->all() as $key => $value) {
            if ($user->$key != $value && array_key_exists($key, $validatedData)) {
                $user->$key = $value;
                $change_count++;
            }
        }
        $user->save();

        if ($change_count == 0) {
            return redirect()->back()->withErrors(['error' => 'No changes made.']);
        }

        return redirect()->back()->with('success', "User updated successfully : $change_count change(s) made.");
    }

    public function deleteUser($id)
    {
        if (!User::find($id)) {
            return redirect()->back()->withErrors(['error' => 'User not found.']);
        }
        User::destroy($id);
        return redirect()->back()->with('success', 'User deleted successfully.');
    }

    /**
     * Display and manage subscriptions.
     * 
     * @return \Illuminate\Http\Response
     */
    public function SubscriptionsPlan()
    {
        return view('admin.subscriptions-plans')->with([
            'subscriptionPlans' => SubscriptionPlans::all(),
            'features' => SubscriptionPlansFeatures::all()
        ]);
    }

    public function newSubscriptionsPlan(Request $request)
    {
        $validatedData = [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ];
        $request->validate($validatedData);
        SubscriptionPlans::create($request->all());
        return redirect()->back()->with('success', 'Subscription plan added successfully.');
    }

    public function updateSubscriptionsPlan(Request $request, $id)
    {
        $validatedData = [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ];
        $request->validate($validatedData);
        SubscriptionPlans::where('id', $id)->update($request->except('_token', '_method'));
        return redirect()->back()->with('success', 'Subscription plan updated successfully.');
    }

    public function deleteSubscriptionsPlan($id)
    {
        $name = DB::table('subscription_plans')->where('id', $id)->value('name');
        SubscriptionPlans::destroy($id);
        return redirect()->back()->with('success', "Subscription plan \"$name\" deleted successfully.");
    }
}


