<?php

namespace Database\Seeders;

use App\Models\IngredientsRecipes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IngredientsRecipesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $recipesIngredients = [
            [
                'quantity' => '200 g',
                'ingredient_id' => 1,
                'recipe_id' => 1,
            ],
            [
                'quantity' => '2 cuillères à soupe',
                'ingredient_id' => 2,
                'recipe_id' => 1,
            ],
            [
                'quantity' => '2 cuillères à café',
                'ingredient_id' => 3,
                'recipe_id' => 1,
            ],
            [
                'quantity' => '1/2 cuillère à café',
                'ingredient_id' => 4,
                'recipe_id' => 1,
            ],
            [
                'quantity' => '240 ml',
                'ingredient_id' => 5,
                'recipe_id' => 1,
            ],
            [
                'quantity' => '2',
                'ingredient_id' => 6,
                'recipe_id' => 1,
            ],
            [
                'quantity' => '30 g',
                'ingredient_id' => 7,
                'recipe_id' => 1,
            ],

            [
                'quantity' => '1',
                'ingredient_id' => 8,
                'recipe_id' => 2,
            ],
            [
                'quantity' => 'Sel',
                'ingredient_id' => 9,
                'recipe_id' => 2,
            ],
            [
                'quantity' => 'Poivre',
                'ingredient_id' => 10,
                'recipe_id' => 2,
            ],
            [
                'quantity' => 'Herbes aromatiques (thym, romarin, etc.)',
                'ingredient_id' => 11,
                'recipe_id' => 2,
            ],

            [
                'quantity' => '3',
                'ingredient_id' => 12,
                'recipe_id' => 3,
            ],
            [
                'quantity' => '1',
                'ingredient_id' => 13,
                'recipe_id' => 3,
            ],
            [
                'quantity' => 'Feuilles de basilic',
                'ingredient_id' => 14,
                'recipe_id' => 3,
            ],
            [
                'quantity' => 'Sel',
                'ingredient_id' => 9,
                'recipe_id' => 3,
            ],
            [
                'quantity' => 'Poivre',
                'ingredient_id' => 10,
                'recipe_id' => 3,
            ],
            [
                'quantity' => 'Huile d\'olive',
                'ingredient_id' => 15,
                'recipe_id' => 3,
            ],

            [
                'quantity' => '400 g',
                'ingredient_id' => 16,
                'recipe_id' => 4,
            ],
            [
                'quantity' => 'Jus de citron vert',
                'ingredient_id' => 17,
                'recipe_id' => 4,
            ],
            [
                'quantity' => '2 cuillères à soupe',
                'ingredient_id' => 18,
                'recipe_id' => 4,
            ],
            [
                'quantity' => '1 gousse',
                'ingredient_id' => 19,
                'recipe_id' => 4,
            ],
            [
                'quantity' => '1 cuillère à café',
                'ingredient_id' => 20,
                'recipe_id' => 4,
            ],
            [
                'quantity' => '1/2 cuillère à café',
                'ingredient_id' => 4,
                'recipe_id' => 4,
            ],
            [
                'quantity' => '4',
                'ingredient_id' => 21,
                'recipe_id' => 4,
            ],
            [
                'quantity' => 'Laitue',
                'ingredient_id' => 22,
                'recipe_id' => 4,
            ],
            [
                'quantity' => '2',
                'ingredient_id' => 23,
                'recipe_id' => 4,
            ],
            [
                'quantity' => 'Salsa',
                'ingredient_id' => 24,
                'recipe_id' => 4,
            ],
            [
                'quantity' => 'Coriandre fraîche',
                'ingredient_id' => 21,
                'recipe_id' => 4,
            ],

            [
                'quantity' => '200 g',
                'ingredient_id' => 24,
                'recipe_id' => 5,
            ],
            [
                'quantity' => '200 g',
                'ingredient_id' => 21,
                'recipe_id' => 5,
            ],
            [
                'quantity' => '200 g',
                'ingredient_id' => 23,
                'recipe_id' => 5,
            ],
            [
                'quantity' => '4',
                'ingredient_id' => 6,
                'recipe_id' => 5,
            ],
            [
                'quantity' => '100 g',
                'ingredient_id' => 22,
                'recipe_id' => 5,
            ],
        ];

        foreach ($recipesIngredients as $recipeIngredient) {
            IngredientsRecipes::create($recipeIngredient);
        }
    }
}
