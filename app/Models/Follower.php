<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Follower extends Model
{
    use Notifiable;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
