<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOfferRequest extends FormRequest
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
            'name' => 'required|string|max:80',
            'description' => 'required|string',
            'duration' => 'required|date_format:H:i',
            'price' => [
                'required',
                'regex:/^\d+(\.\d{1,2})?$/',
                function ($attribute, $value, $fail) {
                    $formattedValue = number_format((float)$value, 2, '.', '');

                    if (strpos($formattedValue, '.') === false) {
                        $formattedValue .= '.00';
                    }

                    if ($value != $formattedValue) {
                        $fail('The ' . $attribute . ' field must be a decimal number or inteager');
                    }
                }
            ],
        ];
    }
}
