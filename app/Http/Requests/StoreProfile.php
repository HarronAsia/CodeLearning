<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfile extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => 'required',
            'place' => '',
            'job' => '',
            'personal_id' => '',
            'issued_date' => '',
            'issued_by' => '',
            'supervisor_name' => '',
            'supervisor_dob' => '',
            'detail' => '',
            'google_plus_name' => '',
            'google_plus_link' => '',
            'aim_link' => '',
            'window_live_link' => '',
            'yahoo_link' => '',
            'icq_link' => '',
            'skype_link' => '',
            'google_talk_link' => '',
            'facebook_link' => '',
            'twitter_link' => '',
        ];
    }
}
