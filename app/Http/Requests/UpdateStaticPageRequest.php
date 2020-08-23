<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStaticPageRequest extends FormRequest
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
            'facebook'=>'nullable|string',
            'behance'=>'nullable|string',
            'twitter'=>'nullable|string',
            'instagram'=>'nullable|string',
            'youtube'=>'nullable|string',
            'linkedin'=>'nullable|string',
            'whats_app'=>'nullable|numeric',
            'phone'=>'nullable|numeric',
            'address'=>'nullable|string',
            'profile'=>'sometimes|file',
        ];
    }
}
