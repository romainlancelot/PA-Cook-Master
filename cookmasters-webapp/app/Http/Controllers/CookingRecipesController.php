<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Comments;
use App\Models\Transactions;
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
        return view('cooking-recipes.index')->with('recipes', CookingRecipes::all());
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
            'cooking_time' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'deliverable' => 'nullable|integer',
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

        if ($request->hasFile('image')) {
            $imageName = $validatedData['name'] . '.' . $request->image->extension();
            $request->image->move(public_path('images/recipes'), $imageName);
            $validatedData['image'] = 'images/recipes/' . $imageName;
        }

        try {
            $cookingRecipe = CookingRecipes::create($validatedData);
            if (isset($validatedData['deliverable'])) {
                $cookingRecipe->update(['deliverable' => 1]);
            } else {
                $cookingRecipe->update(['deliverable' => 0]);
            }
        } catch (\Exception $e) {
            return redirect()->route('cooking-recipes.create')->withErrors(['name' => "Error creating recipe " . $e->getMessage()]);
        }

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
        $recipe = CookingRecipes::find($id);
        $recipe['steps'] = $recipe->steps;
        $recipe['ingredients'] = $recipe->ingredients;

        return view('cooking-recipes.show')->with('recipe', $recipe);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('cooking-recipes.edit')->with('recipe', CookingRecipes::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'description' => 'nullable|required',
            'cooking_time' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'difficulty' => 'required|integer',
            'people' => 'required|integer',
            'deliverable' => 'nullable|integer',
            'steps' => 'nullable|array',
            'steps.*.title' => 'string',
            'steps.*.description' => 'nullable|string',
            'ingredients' => 'nullable|array',
            'ingredients.*.name' => 'string',
            'ingredients.*.quantity' => 'nullable|string',
        ]);

        $recipe = CookingRecipes::where('name', $validatedData['name'])->first();
        if ($recipe && $recipe->id != $id) {
            return redirect()->route('cooking-recipes.edit', $id)->withErrors(['name' => 'Recipe name already exists.']);
        }

        if ($request->hasFile('image')) {
            $imageName = $validatedData['name'] . '.' . $request->image->extension();
            $request->image->move(public_path('images/recipes'), $imageName);
            $validatedData['image'] = 'images/recipes/' . $imageName;
        } elseif ($validatedData['name'] != CookingRecipes::find($id)->name) {
            $imageName = $validatedData['name'] . '.' . explode('.', CookingRecipes::find($id)->image)[1];
            rename(public_path(CookingRecipes::find($id)->image), public_path('images/recipes/' . $imageName));
            $validatedData['image'] = 'images/recipes/' . $imageName;
        }

        try {
            $cookingRecipe = CookingRecipes::find($id);
            $cookingRecipe->update($validatedData);
            if (isset($validatedData['deliverable'])) {
                $cookingRecipe->update(['deliverable' => 1]);
            } else {
                $cookingRecipe->update(['deliverable' => 0]);
            }
        } catch (\Exception $e) {
            return redirect()->route('cooking-recipes.edit', $id)->withErrors(['name' => "Error updating recipe " . $e->getMessage()]);
        }

        RecipesSteps::where('recipe_id', $cookingRecipe->id)->delete();
        if (isset($validatedData['steps'])) {
            foreach ($validatedData['steps'] as $step) {
                $step['recipe_id'] = $cookingRecipe->id;
                RecipesSteps::create($step);
            }
        }

        IngredientsRecipes::where('recipe_id', $cookingRecipe->id)->delete();
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

        return redirect()->route('cooking-recipes.edit', $id)->with('success', 'Recipe updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $recipe = CookingRecipes::find($id);
        $recipe->delete();

        if (file_exists(public_path($recipe->image))) {
            unlink(public_path($recipe->image));
        }

        RecipesSteps::where('recipe_id', $recipe->id)->delete();
        IngredientsRecipes::where('recipe_id', $recipe->id)->delete();

        return redirect()->route('cooking-recipes.index')->with('success', 'Recipe deleted successfully.');
    }


    public function commentShow($transaction_created_at)
    {
        $transaction = Transactions::where('created_at', $transaction_created_at)->get();
        $recipes = [];
        foreach ($transaction as $t) {
            $recipes[] = CookingRecipes::find($t->cooking_recipe_id);
        }

        return view('cooking-recipes.comment')->with([
            'transaction' => $transaction,
            'recipes' => $recipes,
        ]);
    }

    public function comment(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'comment' => 'required|string',
            'rating' => 'required|integer',
        ]);

        if (!$recipe = CookingRecipes::find($id)) {
            return redirect()->route('cooking-recipes.index')->withErrors(['error' => 'Recipe not found.']);
        }
        $comment = Comments::create([
            'user_id' => auth()->user()->id,
            'body' => $validatedData['comment'],
            'rating' => $validatedData['rating'],
        ]);
        $comment->commentable()->associate($recipe);
        $comment->save();

        return redirect()->route('cooking-recipes.show', $id)->with('success', 'Comment added successfully.');
    }
}
