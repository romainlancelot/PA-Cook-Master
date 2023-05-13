<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
}


