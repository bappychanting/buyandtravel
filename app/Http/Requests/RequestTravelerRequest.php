<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestTravelerRequest extends FormRequest
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
            'request_message_subject' => 'max:200',
            'product_name' => 'required|max:100|min:2',
            'quantity' => 'required|numeric|max:100|min:1',
            'expected_price' => 'digits_between:2,6',
            'reference_link' => 'url|max:255|min:10',
            'additional_details' => 'required|max:50000',
        ];
    }
}
