<?php

namespace App\Http\Requests;
use App\Travel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
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

    
    /*$users = Report::whereBetween('created_at', [
        Carbon::parse($request->fromdate)->toDateTimeString(), 
        Carbon::parse($request->todate)->toDateTimeString()
    ])->get();*/


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {    
        $date = Carbon::now()->format('l d F Y');
        $user = Auth::user();
        $travelData = Travel::where('user_id', $user->id)->orderby('leave_date', 'desc')->limit(1)->get();
        foreach($travelData as $data){
            if($data->leave_date > Carbon::now()){
                $date = Carbon::parse($data->leave_date)->format('l d F Y');
            } 
        }

        return [
            'country_id' => 'required',
            'city' => 'required|max:50',
            'destination' => 'required|max:500',
            'arrival_date' => 'required|date|after:'.$date.'|before:'.Carbon::now()->addMonths(1)->format('l d F Y'),
            'leave_date' => 'required|date|after_or_equal:arrival_date',
        ];
    }
}
