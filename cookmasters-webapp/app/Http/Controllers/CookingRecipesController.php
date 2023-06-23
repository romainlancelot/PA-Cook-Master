<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CookingRecipes;
use App\Models\Ingredients;
use App\Models\IngredientsRecipes;
use App\Models\RecipesSteps;

class CookingRecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recipes = CookingRecipes::all();

        foreach ($recipes as $key => $recipe) {
            $recipes[$key]['steps'] = $recipe->steps;
            $recipes[$key]['ingredients'] = $recipe->ingredients;
        }

        return view('cooking-recipes.index')->with('recipes', $recipes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cooking-recipes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'description' => 'nullable|required',
            'duration' => 'required|integer',
            'picture' => 'nullable|image',
            'difficulty' => 'required|integer',
            'people' => 'required|integer',
            'steps' => 'nullable|array',
            'steps.*.title' => 'string',
            'steps.*.description' => 'nullable|string',
            'ingredients' => 'nullable|array',
            'ingredients.*.name' => 'string',
            'ingredients.*.quantity' => 'nullable|string',
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        $recipe = CookingRecipes::where('name', $validatedData['name'])->first();
        if ($recipe) {
            return redirect()->route('cooking-recipes.create')->withErrors(['name' => 'Recipe name already exists.']);
        }

        try {
            $cookingRecipe = CookingRecipes::create($validatedData);
        } catch (\Exception $e) {
            return redirect()->route('cooking-recipes.create')->withErrors(['name' => "Error creating recipe " . $e->getMessage()]);
        }
        // dd($request->all());

        if (isset($validatedData['steps'])) {
            foreach ($validatedData['steps'] as $step) {
                $step['recipe_id'] = $cookingRecipe->id;
                RecipesSteps::create($step);
            }
        }

        if (isset($validatedData['ingredients'])) {
            foreach ($validatedData['ingredients'] as $ingredient) {
                $ingredient['recipe_id'] = $cookingRecipe->id;
                if (!Ingredients::where('name', $ingredient['name'])->first()) {
                    Ingredients::create($ingredient);
                }
                $ingredient['ingredient_id'] = Ingredients::where('name', $ingredient['name'])->first()->id;
                IngredientsRecipes::create($ingredient);
            }
        }

        return redirect()->route('cooking-recipes.create')->with('success', 'Recipe created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
