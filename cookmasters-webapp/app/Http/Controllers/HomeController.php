<?php

namespace App\Http\Controllers;
use App\Models\Workshop;
use App\Models\Comments;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller inst ance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $workshops = Workshop::orderBy('created_at', 'desc')->take(3)->get();
        $comments = comments::take(3)->get();

        return view('home.index', compact('workshops', 'comments'));
    }
}
