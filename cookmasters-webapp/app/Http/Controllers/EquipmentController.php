<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEquipmentRequest;
use App\Http\Requests\UpdateEquipmentRequest;
use App\Models\Equipment;

class EquipmentController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipments = Equipment::all();
        return view('equipments.index', compact('equipments'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('equipments.create');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEquipmentRequest $request)
    {
        $validatedData = $request->validated();
    
        $data = [];
    
        if($request->hasfile('photos'))
        {
            foreach($request->file('photos') as $image)
            {
                $name = time().'_'.$image->getClientOriginalName();
                $image->storeAs('public/images', $name);
                $data[] = $name;
            }
        }
    
        $equipment = new Equipment();
        $equipment->name = $request->get('name');
        $equipment->availablequantity = $request->get('availablequantity');
        $equipment->price = $request->get('price');
        $equipment->description = $request->get('description');
        $equipment->photos = json_encode($data);
        $equipment->save();
    
        return redirect()->route('boutiques.index')->with('success', 'Equipment created successfully');
    }
    
    
    /**
     * Display the specified resource.
     */
    public function show(Equipment $equipment)
    {
        return view('equipments.show', compact('equipment'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Equipment $equipment)
    {
        return view('equipments.edit', compact('equipment'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEquipmentRequest $request, Equipment $equipment)
    {
        // Validation des données
        $validatedData = $request->validated();
    
        // Update des informations basiques du produit
        $equipment->name = $validatedData['name'];
        $equipment->description = $validatedData['description'];
        $equipment->availablequantity = $validatedData['availablequantity'];
        $equipment->price = $validatedData['price'];
    
        // Si de nouvelles photos sont uploadées
        if($request->hasfile('photos'))
        {
            // on supprime les anciennes images
            foreach($equipment->photos as $photo) {
                Storage::delete('public/images/'.$photo);
            }
    
            // Et on ajoute les nouvelles images
            $images = [];
            foreach($request->file('photos') as $image)
            {
                $name = time().'_'.$image->getClientOriginalName();
                $image->storeAs('public/images', $name);
                $images[] = $name;
            }
            $equipment->photos = json_encode($images);
        }
    
        // Enregistrement des changements dans la base de données
        $equipment->save();
    
        return redirect()->route('equipments.index')->with('success', 'Equipment updated successfully');
    }
    
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Equipment $equipment)
    {
        $equipment->delete();
        return redirect()->route('boutiques.index')->with('success', 'Equipment deleted successfully');
    }
    
}
