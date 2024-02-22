<?php

namespace App\Http\Requests\Manifest;

use Illuminate\Foundation\Http\FormRequest;

class StoreManifestRequest extends FormRequest
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
            'manifest_number' => 'required|string|unique:containers',
            'manifest_date' => 'required|string',
            'shipment_id' => 'required|integer',
        ];
    }
}
