<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBoutiqueRequest;
use App\Http\Requests\UpdateBoutiqueRequest;
use App\Models\Boutique;
use App\Models\Room;
use App\Models\Equipment;
use Illuminate\Http\Request;

class BoutiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $equipments = Equipment::query();
        $filers = 0;
        if ($request->has('search') && $request->search != '') {
            $equipments->where('name', 'like', "%{$request->search}%");
            $filers = 1;
        }
        if ($request->has('price_min') && $request->has('price_max')) {
            if ($request->price_min != '' && $request->price_max != '') {
                $equipments->whereBetween('price', [$request->price_min, $request->price_max]);
                $filers = 1;
            }
        }
        if ($request->has('price_min') && $request->price_min != '') {
            $equipments->where('price', '>=', $request->price_min);
            $filers = 1;
        }
        if ($request->has('price_max') && $request->price_max != '') {
            $equipments->where('price', '<=', $request->price_max);
            $filers = 1;
        }
        if ($request->has('categories') && count($request->categories) > 0) {
            $equipments->whereIn('category', $request->categories);
            $filters = 1;
        }

        if ($filers == 0) {
            $equipments = Equipment::all();
        } else {
            $equipments = $equipments->get();
        }
        return view('boutique.index', compact('equipments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBoutiqueRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Boutique $boutique)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Boutique $boutique)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBoutiqueRequest $request, Boutique $boutique)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Boutique $boutique)
    {
        //
    }
}
