<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddNewFuneralRequest extends FormRequest
{
    protected $redirect = "/#order";
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
            'pesel' => 'required|integer|min:00000000000|max:99999999999|digits:11',
            'email' => 'required|email',
            'phone_number' => 'required|integer|min:000000000|max:999999999|digits:9',
            'offer_id' => [
                'required',
                'integer',
                Rule::exists('offers', 'id'),
            ],
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|date_format:H:i',
        ];
    }
}
