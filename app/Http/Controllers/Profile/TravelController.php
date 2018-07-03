<?php

namespace App\Http\Controllers\Profile;
use Countries;
use App\Travel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class TravelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('profile.travel.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $countries = Countries::getListForSelect();
        return view('profile.travel.create', compact('user', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'country' => 'required',
            'city' => 'required|max:50',
            'destination' => 'required|max:500',
            'arrival_date' => 'required',
            'leave_date' => 'required',
        ]);

        $input = $request->all();
        Travel::create($input);

        return redirect()->route('travel.index');

        /*protected $fillable = ['concept','description','amount','status','date'];
        {{ Form::select('status', ['0' => 'Paid', '1' => 'Unpaid'], null, ['class' => 'form-control', 'id' => 'status']) }} 
        $this->validate($request, [
        'concept' => 'required|unique:course,concept|max:15',
        'description' => 'required|max:50',
        'amount' => 'required|numeric|max:50',
        'date' => 'required|date|after:tomorrow',
        ]); 
        $input = $request->all();
        Course::create($input);*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
