<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionPlans extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'price',
        'duration',
        'description',
        'stripe_id',
        'stripe_plan',
    ];

    /**
     * Get the features of the subscription plan.
     */
    public function features()
    {
        return $this->belongsToMany(SubscriptionPlansFeatures::class, 'features_relationships', 'subscription_plan_id', 'feature_id');
    }
}