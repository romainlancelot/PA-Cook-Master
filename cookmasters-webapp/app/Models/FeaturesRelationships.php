<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturesRelationships extends Model
{
    use HasFactory;

    protected $fillable = [
        'subscription_plan_id',
        'feature_id',
    ];
}
