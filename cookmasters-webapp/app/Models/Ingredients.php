<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredients extends Model
{
    use HasFactory;

    protected $table = 'ingredients';

    protected $fillable = [
        'name',
        'image',
        'calories',
        'carbohydrates',
        'proteins',
        'fats',
        'sugars',
        'fiber'
    ];

    public function recipes()
    {
        return $this->belongsToMany(Recipes::class, 'ingredients_recipes', 'ingredient_id', 'recipe_id');
    }

    public function utensils()
    {
        return $this->belongsToMany(Utensils::class, 'ingredients_utensils', 'ingredient_id', 'utensil_id');
    }
}
