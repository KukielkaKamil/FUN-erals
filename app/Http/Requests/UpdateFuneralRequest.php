<?php

namespace App\Http\Requests;

use App\Models\Offer;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateFuneralRequest extends FormRequest
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
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'cost' => [
                'required',
                'regex:/^\d+(\.\d{1,2})?$/',
                function ($attribute, $value, $fail) {
                    $formattedValue = number_format((float)$value, 2, '.', '');

                    if (strpos($formattedValue, '.') === false) {
                        $formattedValue .= '.00';
                    }

                    if ($value != $formattedValue) {
                        $fail('The '.$attribute.' field must be a decimal number or inteager');
                    }
                }
            ],
            'offer_id' => [
                'required',
                'integer',
                Rule::exists('offers', 'id'),
            ],
            'workers' => [
                'required',
                'array',
                Rule::exists('users', 'id'),
            ],
        ];
    }
}
