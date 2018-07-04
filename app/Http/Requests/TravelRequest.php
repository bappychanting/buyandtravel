<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TravelRequest extends FormRequest
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
            'country' => 'required',
            'city' => 'required|max:50',
            'destination' => 'required|max:500',
            'arrival_date' => 'required|date',
            'leave_date' => 'required|date|after_or_equal:arrival_date',
        ];
    }

    /*public function messages()
    {
        return [
            'p_type.required' => "The type field is required.",
            'price.regex' => "The price does not match the format ###.##.",
        ];
    }*/
}
