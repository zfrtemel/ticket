<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FlightTicketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'origin' => 'required|string|size:3',
            'destination' => 'required|string|size:3',
            'departure_date' => 'required|date|after:today',
            'return_date' => 'nullable|date|after:departure_date',
            'passengers' => 'required|array',
            'passengers.ADT' => 'required|integer|min:1',
            'passengers.CHD' => 'nullable|integer',
            'passengers.INF' => 'nullable|integer|max:passengers.ADT',
            'passengers.ADT' => 'required|integer|min:1',
            'passengers.CHD' => 'nullable|integer',
            'passengers.INF' => 'nullable|integer|max:passengers.ADT',
        ];
    }
}
