<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable 
{
    use HasApiTokens,Notifiable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'photo', 'dob', 'number', 'role', 'google_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'role' => 'array',
    ];

    //Make Default for every User to be manager
    protected $attributes = [
        'role' => 'manager',
    ];
    //Carbonize timestamps
    protected $dates = ['created_at', 'deleted_at'];

    public function profile()
    {
        return $this->hasOne(Profile::class)->withDefault();;
    }

    public function following()
    {
        return $this->belongsToMany(Community::class, 'followers', 'follower_id', 'following_id')->withTimestamps()->withDefault();;
    }


    //*********************************mutator************************************************************************************************************

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst($value);
    }

    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = ucfirst($value);
    }

    public function setRoleAttribute($value)
    {
        $this->attributes['role'] = ucfirst($value);
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }


    //*********************************mutator************************************************************************************************************

    
}
