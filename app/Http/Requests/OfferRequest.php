<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
            'offer_message_subject' => 'max:200',
            'product_quantity' => 'required|numeric|max:100|min:1',
            'asking_price' => 'required|numeric|digits_between:2,6',
            'delivery_date' => 'required|date|after:'.Carbon::now()->format('l d F Y'),
            'additional_details' => 'required|max:50000',
        ];
    }
}
