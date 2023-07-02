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
     * Get the user who sent the message.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'from_id');
    }

    /**
     * Get the user who sent the message.
     */
    public function fromUser()
    {
        return $this->belongsTo(User::class, 'from_id');
    }

    /**
     * Get the user who received the message.
     */
    public function toUser()
    {
        return $this->belongsTo(User::class, 'to_id');
    }
}
