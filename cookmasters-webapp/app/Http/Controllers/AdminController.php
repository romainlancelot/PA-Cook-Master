<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $subscriptions_plans = DB::table('subscriptions')->get();
        return view('admin.subscriptions-plans')->with('subscriptions_plans', $subscriptions_plans);
    }

    public function newSubscriptionsPlan(Request $request)
    {
        $validatedData = [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|numeric|min:0',
        ];
        $request->validate($validatedData);
        DB::table('subscriptions')->insert([
            'subscription_name' => $request->name,
            'subscription_price' => $request->price,
            'subscription_duration' => $request->duration,
        ]);
        return redirect()->back()->with('success', 'Subscription plan added successfully.');
    }

    public function updateSubscriptionsPlan(Request $request, $id)
    {
        $validatedData = [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|numeric|min:0',
        ];
        $request->validate($validatedData);
        DB::table('subscriptions')->where('subscription_id', $id)->update([
            'subscription_name' => $request->name,
            'subscription_price' => $request->price,
            'subscription_duration' => $request->duration,
        ]);
        return redirect()->back()->with('success', 'Subscription plan updated successfully.');
    }

    public function deleteSubscriptionsPlan($id)
    {
        $name = DB::table('subscriptions')->where('subscription_id', $id)->value('subscription_name');
        DB::table('subscriptions')->where('subscription_id', $id)->delete();
        return redirect()->back()->with('success', "Subscription plan \"$name\" deleted successfully.");
    }
}


