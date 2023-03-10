<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgreementRequest extends FormRequest
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
            'tenant_id' => 'required|exists:tenants,id',
            'rent' => 'required|numeric',
            'service_charge' => 'required|numeric',
            'repair_charge' => 'required|numeric',
            'due_date' => 'required|date|after:tomorrow',
        ];
    }
}
