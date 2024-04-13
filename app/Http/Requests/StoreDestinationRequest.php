<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDestinationRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'description' => 'required|string',
            'location' => 'required|string',
            'address' => 'required|string',
            'phone_number' => 'required|string',
            'cover' => 'required|image',
            'logo' => 'required|image',
            'city' => 'required|string',
            'country' => 'required|string',
            'state' => 'required|string',
            'type' => 'required|string',
            'category' => 'required|string',
            'status' => 'required|string',
            'age_restriction' => 'numeric',

        ];
    }
}
