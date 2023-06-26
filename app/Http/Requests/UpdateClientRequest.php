<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
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
            'name' => 'required|string|',
            'surname'=>'required|string',
            'pesel' => 'required|digits:11|regex:/^\d{11}$/|unique:clients,pesel,'.$this->id,
            'email' => 'required|unique:clients,email,'.$this->id.'|email',
            'phone_number' => 'required|digits:9|regex:/^\d{9}$/',
        ];
    }
}
