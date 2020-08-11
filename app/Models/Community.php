<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Community extends Model
{
    use SoftDeletes, Notifiable;

    protected $fillable = ['title', 'banner'];

    public function posts()
    {
        return $this->hasMany('App\Models\Post')->withDefault();;
    }

    // users that follow this user
    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'following_id', 'follower_id');
    }

    //*********************************mutator************************************************************************************************************

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = ucfirst($value);
    }

    //*********************************mutator************************************************************************************************************

    public function scopeOfId($query, $id)
    {
        return $query->whereId($id);
    }
}
