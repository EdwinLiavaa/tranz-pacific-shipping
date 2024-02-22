<?php

namespace App\Http\Requests\Shipment;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateShipmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'hbl_number' => 'required|string',
            'consignor' => 'required|string',
            'consignee' => 'required|string',
            'weight' => 'required|integer',
            'volume' => 'required|integer',
            'packages' => 'required|integer',
            'handling_instructions' => 'nullable|max:1000',
            'container_id' => 'required|integer',
        ];
    }
}
