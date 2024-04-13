<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAgenciesRequest extends FormRequest
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

            'name' => 'required',
            'name_juridical' => 'required',
            'cover' => 'required',
            'bio' => 'required',
            'logo' => 'required | image',
            'cedula' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'email' => 'required',
            'bank_account' => 'required',
        ];
    }
}
