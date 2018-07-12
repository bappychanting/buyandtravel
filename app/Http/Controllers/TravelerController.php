<?php

namespace App\Http\Controllers;
use Countries;
use App\Travel;
use Illuminate\Http\Request;

class TravelerController extends Controller
{
    protected $travel;

    public function __construct(Travel $travel)
    {
        $this->travel = $travel;
    }

    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $country = $request->country;
        $from = $request->from;
        $to = $request->to;
        if(isset($from) && isset($to)){
        	$travelers = $this->travel->search($keyword)->search($country)->whereBetween('arrival_date', [date('Y-m-d', strtotime($from)), date('Y-m-d', strtotime($to))])->orderBy('created_at', 'desc')->orWhereBetween('leave_date', [date('Y-m-d', strtotime($from)), date('Y-m-d', strtotime($to))])->orderBy('created_at', 'desc')->paginate(30);
        }else{
            $travelers = $this->travel->search($keyword)->search($country)->orderBy('created_at', 'desc')->paginate(30);
        }
        $countries = Countries::getListForSelect();
        return view('travel.index', compact('travelers', 'countries', 'keyword', 'country', 'from', 'to'));
    }

    public function show($id)
    {
        $traveler = $this->travel->findOrFail($id);
        $countries = Countries::getListForSelect();
        return view('travel.show', compact('traveler', 'countries'));
    }
}
