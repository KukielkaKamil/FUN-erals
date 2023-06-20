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
            'time' => 'required',
            'cost' => 'required|decimal:2',
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
