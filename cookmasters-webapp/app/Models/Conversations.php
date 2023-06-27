<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversations extends Model
{
    use HasFactory;

    protected $table = 'messages';

    protected $fillable = [
        'message',
        'read_at',
        'from_id',
        'to_id'
    ];

    /**
     * Get the user that owns the recipe.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'from_id');
    }
}
