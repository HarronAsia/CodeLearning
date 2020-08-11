<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Comment extends Model
{
    use Notifiable, SoftDeletes;

    protected $fillable = ['comment_image', 'comment_detail', 'user_id', 'reply_id', 'post_id'];

    public function commentable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User')->withDefault();;
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'reply_id', 'id')->withDefault();;
    }

    public function like()
    {
        return $this->morphOne('App\Models\Like', 'likeable')->withDefault();;
    }

    public function likes()
    {
        return $this->morphMany('App\Models\Like', 'likeable')->withDefault();;
    }

    //*********************************mutator************************************************************************************************************

    public function setComment_detailAttribute($value)
    {
        $this->attributes['comment_detail'] = ucfirst($value);
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
    public function scopeOfPost($query, $id)
    {
        return $query->whereCommentableId($id);
    }

    public function scopeOfId($query, $id)
    {
        return $query->whereId($id);
    }

}
