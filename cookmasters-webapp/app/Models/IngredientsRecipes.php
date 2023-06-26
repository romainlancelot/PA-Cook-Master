<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngredientsRecipes extends Model
{
    use HasFactory;

    protected $table = 'recipes_ingredients';

    protected $fillable = [
        'quantity',
        'ingredient_id',
        'recipe_id'
    ];
}
