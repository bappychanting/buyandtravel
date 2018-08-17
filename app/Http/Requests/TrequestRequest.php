<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrequestRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product_name' => 'required|max:100|min:2',
            'request_message_subject' => 'required|max:200',
            'quantity' => 'required|numeric|max:100|min:1',
            'expected_price' => 'digits_between:2,6',
            'reference_link' => 'url|max:255|min:10',
            'additional_details' => 'required|max:50000',
        ];
    }
}
