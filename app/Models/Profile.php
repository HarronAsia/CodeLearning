<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Profile extends Model
{
    use Notifiable;
    protected $fillable = [
        'place', 'job', 'personal_id', 'issued_date', 'issued_by', 'supervisor_name', 'supervisor_dob', 'detail','google_plus_name','google_plus_link','aim_link','window_live_link','icq_link','skype_link','google_talk_link','facebook_link','twitter_link',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User')->withDefault();;
    }

     //*********************************mutator************************************************************************************************************

     public function setPlaceAttribute($value)
     {
         $this->attributes['place'] = ucfirst($value);
     }
 
     public function setJobAttribute($value)
     {
         $this->attributes['job'] = ucfirst($value);
     }
 
     public function setSupervisorNameAttribute($value)
     {
         $this->attributes['supervisor_name'] = ucfirst($value);
     }
 
     public function setDetailAttribute($value)
     {
         $this->attributes['detail'] = ucfirst($value);
     }
 
     public function setGooglePlusNameAttribute($value)
     {
         $this->attributes['google_plus_name'] = ucfirst($value);
     }
 
     //*********************************mutator************************************************************************************************************

     public function scopeOfId($query, $id)
    {
        return $query->whereUserId($id);
    }
 
}
