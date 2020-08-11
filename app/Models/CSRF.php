<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class CSRF extends Model
{
    use Notifiable;
    protected $fillable = [
        'name',
    ];

    public function scopeCreatedAt($query)
     {
         return $query->orderBy('created_at','desc');
     }
}
