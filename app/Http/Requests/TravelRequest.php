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


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {    
        $user = Auth::user();
        $date = Carbon::now()->format('l d F Y');
        $previous_leave_date = '';
        $next_arrival_date = '';
        if(!empty($this->id)){
            $currentTravelData = Travel::where('id', $this->id)->get();
            foreach($currentTravelData as $data){
                $currentArrivalDate = $data->arrival_date;
                $currentLeaveDate = $data->leave_date;
            }
            $travelData = Travel::where('user_id', $user->id)->where('id', '<>', $this->id)->orderby('arrival_date', 'desc')->get();
            foreach($travelData->reverse() as $data){
                if($data->leave_date > $currentArrivalDate){
                    break;
                }
                $previous_leave_date = Carbon::parse($data->leave_date)->format('l d F Y');
            }
            foreach($travelData as $data){
                if($data->arrival_date < $currentLeaveDate){
                    break;
                } 
                $next_arrival_date = Carbon::parse($data->arrival_date)->format('l d F Y');
            }
        }
        else{
            $travelData = Travel::where('user_id', $user->id)->orderby('leave_date', 'desc')->limit(1)->get();
            foreach($travelData as $data){
                if($data->leave_date > Carbon::now()){
                    $date = Carbon::parse($data->leave_date)->format('l d F Y');
                } 
            }
        }

        return [
            'country_id' => 'required',
            'city' => 'required|max:50|min:2',
            'destination' => 'required|max:500|min:2',
            'arrival_date' => 'required|date'.(!empty($previous_leave_date) ? '|after:'.$previous_leave_date : '|after:'.$date).(!empty($next_arrival_date) ? '|before:'.$next_arrival_date : '|before:'.Carbon::now()->addMonths(1)->format('l d F Y')),
            'leave_date' => 'required|date|after_or_equal:arrival_date'.(!empty($next_arrival_date) ? '|before:'.$next_arrival_date : ""),
            'tags' => 'max:255',
            'additional_details' => 'max:50000',
        ];
    }

    public function messages()
    {
        return [
            'country_id.required' => "Please select a country.",
        ];
    }
}
