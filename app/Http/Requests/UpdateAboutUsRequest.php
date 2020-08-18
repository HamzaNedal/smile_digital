<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAboutUsRequest extends FormRequest
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
           'ar.who_are_smile_digital.value'=>'required|string',
           'ar.our_vision.value'=>'required|string',
           'ar.our_mission.value'=>'required|string',
           'ar.our_values.value'=>'required|string',
           'ar.our_team.value'=>'required|string',
           
           'en.who_are_smile_digital.value'=>'required|string',
           'en.our_vision.value'=>'required|string',
           'en.our_mission.value'=>'required|string',
           'en.our_values.value'=>'required|string',
           'en.our_team.value'=>'required|string',

           'tr.who_are_smile_digital.value'=>'required|string',
           'tr.our_vision.value'=>'required|string',
           'tr.our_mission.value'=>'required|string',
           'tr.our_values.value'=>'required|string',
           'tr.our_team.value'=>'required|string',
        ];
    }
}
