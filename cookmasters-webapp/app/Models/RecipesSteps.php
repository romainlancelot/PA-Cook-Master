<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipesSteps extends Model
{
    use HasFactory;

    protected $table = 'recipes_steps';

    protected $fillable = [
        'step',
        'title',
        'description',
        'recipe_id',
    ];
}
