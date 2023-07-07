<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    protected $fillable = [
        'user_id',
        'equipment_id',
        'quantity',
        'returned_at',
        'price',
        'stripe_payment_intent_id',
        'delivered_at',
        'in_delivery',
        'in_preparation',
        'accepted_at',
    ];

    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }

    public function cookingRecipe()
    {
        return $this->belongsTo(CookingRecipes::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    static public function getUserTransactions($user_id = null)
    {
        if (!$user_id) {
            $user_id = auth()->user()->id;
        }
        
        $transactions = Transactions::all()->where('user_id', $user_id)
        ->where('returned_at', null)
        ->groupBy('created_at');

        foreach ($transactions as $key => $value) {
            foreach ($value as $k => $v) {
                if ($v->equipment_id) {
                    $transactions[$key][$k]['equipment'] = Equipment::find($v->equipment_id);
                }
                if ($v->cooking_recipe_id) {
                    $transactions[$key][$k]['cooking_recipe'] = CookingRecipes::find($v->cooking_recipe_id);
                }
            }
        }

        $transactions = $transactions->map(function ($item) {
            $total = 0;
            foreach ($item as $key => $value) {
                $total += $value['price'];
            }
            return [
                'total' => $total,
                'items' => $item
            ];
        });

        return $transactions;
    }
}
