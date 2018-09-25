<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class cartesRequest extends FormRequest
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
            'letitre' => 'required|max:255',
            'num1' => 'required',
            'num2' => 'required',
            'ladescription' => 'required',
            'image' => 'nullable',
        ];
    }
}
