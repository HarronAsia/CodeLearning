<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Post extends Model
{
    use Notifiable, SoftDeletes;

    protected $fillable = ['title', 'detail', 'image', 'status'];
    protected $hidden = ['user_id', 'community_id',];

    public function community()
    {
        return $this->belongsTo('App\Models\Community')->withDefault();;
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User')->withDefault();;
    }

    public function comment()
    {
        return $this->morphOne('App\Models\Comment', 'commentable')->withDefault();;
    }

    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'commentable')->withDefault();;
    }

    public function likes()
    {
        return $this->morphMany('App\Models\Like', 'likeable')->withDefault();;
    }

    public function like()
    {
        return $this->morphOne('App\Models\Like', 'likeable')->withDefault();;
    }



     //*********************************mutator************************************************************************************************************

     public function setTitleAttribute($value)
     {
         $this->attributes['title'] = ucfirst($value);
     }
 
     public function setDetailAttribute($value)
     {
         $this->attributes['detail'] = ucfirst($value);
     }
 
     public function setStatusAttribute($value)
     {
         $this->attributes['status'] = ucfirst($value);
     }

 
     //*********************************mutator************************************************************************************************************
     public function scopeCreatedAt($query)
     {
         return $query->orderBy('created_at','desc');
     }

     public function scopeOfCommunity($query,$id)
     {
      
         return $query->whereCommunityId($id);
        
     }

     public function scopeOfId($query,$id)
     {
         return $query->whereId($id);
     }
}
