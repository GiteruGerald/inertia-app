<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnitRequest extends FormRequest
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
            'unit_no'=> 'required|string|max:50',
            'block'=> 'required|string',
            'type'=> 'required|string',
            'property_id'=> 'required|integer|exists:properties,id',
        ];
    }
}
