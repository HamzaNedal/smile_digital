<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateServiceRequest extends FormRequest
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
            'ar.title'=>'required|string',
            'en.title'=>'required|string',
            'tr.title'=>'required|string',

            'ar.description'=>'required|string',
            'en.description'=>'required|string',
            'tr.description'=>'required|string',

            'category_id'=>'required|integer',
            
        ];
    }
}
