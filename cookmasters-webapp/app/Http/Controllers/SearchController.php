<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Search for users
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function users($search)
    {
        $users = User::where('firstname', 'like', '%' . $search . '%')
            ->orWhere('lastname', 'like', '%' . $search . '%')
            ->orWhere('username', 'like', '%' . $search . '%')
            ->get();

        // remove current user from results
        if (($key = array_search(auth()->user()->id, $users->pluck('id')->toArray())) !== false) {
            unset($users[$key]);
        }
            
        return response()->json($users);
    }
}
