<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'username',
        'password',
        'image',
        'phone',
        'birthday',
        'country',
        'city',
        'address',
        'zip_code',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'birthday' => 'datetime',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
    * Always encrypt the password when it is updated.
    *
    * @param $value
    * @return string
    */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * Get the role of the user.
     */
    public function role_name()
    {
        return DB::table('roles')->where('id', $this->role_id)->value('name');
    }

    public function role()
    {
        return $this->belongsTo(Roles::class, 'role_id');
    }

    /**
     * Get the Subscription Plan of the user.
     */
    public function subscriptionPlan()
    {
        return $this->belongsTo(SubscriptionPlans::class, 'subscription_plan_id', 'id');
    }
}
