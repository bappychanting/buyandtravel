<?php

namespace App\Http\Requests;
use App\Travel;
use Carbon\Carbon;
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

    /*public function sanitize()
    {*/
       /* $input = $this->all();
        $input['arrival_date'] = Carbon::parse($input['arrival_date'])->format('Y-m-d');
        $input['leave_date'] = Carbon::parse($input['leave_date'])->format('Y-m-d');
        $this->replace($input);*/

        /*$input->merge([
            'arrival_date' => Carbon::parse($input->arrival_date)->format('Y-m-d'), 
            'leave_date' => Carbon::parse($input->leave_date)->format('Y-m-d')
        ]);*/
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        
            // Select the last travel date of the user from database using elequent and compare it with arrival date
        // where('date', '<=', $date)
        // 'date_to'    => 'required|date_format:"d/m/Y"|after:' . $dateFromForm,

        $date = Carbon::now()->format('l d F Y');

        return [
            'country' => 'required',
            'city' => 'required|max:50',
            'destination' => 'required|max:500',
            'arrival_date' => 'required|date|after:'.$date,
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
