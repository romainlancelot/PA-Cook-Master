<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CookingRecipes extends Model
{
    use HasFactory;


    protected $table = 'cooking_recipes';

    protected $fillable = [
        'name',
        'description',
        'image',
        'cooking_time',
        'difficulty',
        'people',
        'user_id'
    ];

    /**
     * Get the ingredients of the recipe.
     */
    public function ingredients()
    {
        $ingredients = $this->belongsToMany(Ingredients::class, 'recipes_ingredients', 'recipe_id', 'ingredient_id');
        $ingredients->withPivot('quantity');
        return $ingredients;
    }

    /**
     * Get the utensils of the recipe.
     */

    public function utensils()
    {
        return $this->belongsToMany(Utensils::class, 'recipe_utensils', 'recipe_id', 'utensil_id');
    }

    /**
     * Get the steps of the recipe.
     */
    public function steps()
    {
        return $this->hasMany(RecipesSteps::class, 'recipe_id');
    }

    /**
     * Get the user that owns the recipe.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
