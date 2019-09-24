<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'product_name' => 'required|max:100|min:2',
            'product_type_id' => 'required',
            'expected_price' => 'digits_between:2,6',
            'reference_link' => 'url|max:255|min:10',
            'delivery_location' => 'required|max:255|min:2',
            'tags' => 'max:255',
            'additional_details' => 'max:50000',
        ];
    }

    public function messages()
    {
        return [
            'product_type_id.required' => "Please select a category.",
        ];
    }
}
