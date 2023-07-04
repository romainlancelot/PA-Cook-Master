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
    ];

    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
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
        ->groupBy('created_at')
        ->map(function ($item) {
            return $item->map(function ($item) {
                return [
                    'id' => $item->id,
                    'equipment_id' => $item->equipment_id,
                    'equipment_name' => $item->equipment->name,
                    'equipment_image' => $item->equipment->image,
                    'quantity' => $item->quantity,
                    'price' => $item->price,
                    'created_at' => $item->created_at,
                ];
            });
        });

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
