<?php

namespace App\Http\Requests\Container;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateContainerRequest extends FormRequest
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
            'container_number'  => 'required|string',
            'container_type'    => 'required|string',
            'seal_number'       => 'required|string',
            'tare_weight'       => 'required|integer',
            'gross_weight'      => 'required|integer',
            'volume'            => 'required|integer',
            'customer_id'       => 'required|integer'
        ];
    }
}
