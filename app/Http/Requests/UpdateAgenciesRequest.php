<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAgenciesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'string',
            'name_juridical' => 'string',
            'cover' => 'string',
            'bio' => 'string',
            'logo' => 'string ',
            'cedula' => 'string',
            'phone_number' => 'string',
            'address' => 'string',
            'email' => 'string',
            'bank_account' => 'string',
        ];
    }
}
