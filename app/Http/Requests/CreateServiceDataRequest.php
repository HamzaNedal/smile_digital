<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateServiceDataRequest extends FormRequest
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
            'name' => 'required|string',
            'country' => 'required|string',
            'phone_country_code' => 'required|integer',
            'phone_no' => 'required|numeric',
            'email' => 'required|email',
            'service_id' => 'required|integer',
            'short_description' => 'required|string|max:255',
            'file' => 'required|file|max:5120',
        ];
    }
}
