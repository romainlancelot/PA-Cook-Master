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
}
