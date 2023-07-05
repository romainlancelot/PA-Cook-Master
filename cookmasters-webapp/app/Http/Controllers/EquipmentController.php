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
                $image->storeAs('public/equipments', $name);
                $data[] = $name;
            }
        }
        $key_features = [];
        if($request->has('key_features'))
        {
            foreach($request->get('key_features') as $key_feature)
            {
                $key_features[] = $key_feature;
            }
        }
        $colors = [];
        if($request->has('colors'))
        {
            foreach($request->get('colors') as $color)
            {
                $colors[] = $color;
            }
        }

        $equipment = new Equipment();
        $equipment->name = $request->get('name');
        $equipment->category = $request->get('category');
        $equipment->marque = $request->get('marque');
        $equipment->key_features = json_encode($key_features);
        $equipment->colors = json_encode($colors);
        $equipment->simple_description = $request->get('simple_description');
        $equipment->warranty_url = $request->get('warranty_url');
        $equipment->height = $request->get('height');
        $equipment->width = $request->get('width');
        $equipment->depth = $request->get('depth');
        $equipment->dimensional_guide_url = $request->get('dimensional_guide_url');
        $equipment->name_3d = $request->get('name_3d');
        $equipment->manual_url = $request->get('manual_url');
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
        $equipments = Equipment::query();
        $equipments->where('category', $equipment->category);
        $equipments->where('marque', $equipment->marque);
        $equipments = $equipments->get();

        if ($equipments->count() > 3) {
            $equipments = $equipments->random(3);
        } else {
            if (Equipment::all()->count() >= 3) {
                $equipments = Equipment::all()->random(3);
            } else {
                $equipments = Equipment::all();
            }
        }
        return view('equipments.show', compact('equipments', 'equipment'));
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
