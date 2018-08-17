<?php

namespace App\Http\Controllers;
use PDF;
use Countries;
use App\Travel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if(Auth::user() && Auth::user()->id <> $traveler->user->id){
            $traveler->views = $traveler->views + 1;
            $traveler->save();
        }
        $countries = Countries::getListForSelect();
        return view('travel.show', compact('traveler', 'countries'));
    }

    public function downloadPDF($id)
    {
        $traveler = $this->travel->findOrFail($id);
        $pdf = PDF::loadView('pdf.travel', compact('traveler'));
        return $pdf->download($traveler->user->name.'_'.$traveler->city.'_'.$traveler->country->name.'_'.date('F Y', strtotime($traveler->arrival_date)).'.pdf');
    }

    public function addRequest($id)
    {
        $traveler = $this->travel->findOrFail($id);
        $user = Auth::user();
        $countries = Countries::getListForSelect();
        return view('travel.request', compact('traveler', 'user', 'countries'));
    }
}
