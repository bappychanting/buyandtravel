<?php

namespace App\Http\Controllers\Profile;
use Countries;
use App\Travel;
use App\User;
use Carbon\Carbon;
use App\Http\Requests\TravelRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class TravelController extends Controller
{

    protected $travel;
    protected $user;

    public function __construct(Travel $travel, User $user)
    {
        $this->middleware('auth');
        $this->middleware('travel.owner', ['only' => ['show', 'edit']]);
        $this->travel = $travel;
        $this->user = $user;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $user = $this->user->find(Auth::user()->id);
        $search = \Request::get('search');
        $travelHistory = $user->travels()->search($search)->orderBy('arrival_date', 'desc')->paginate(20);
        return view('profile.travel.index', compact('user', 'travelHistory', 'search'));
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
    public function store(TravelRequest $request)
    {
        $input = $request->all();
        $input['arrival_date'] = Carbon::parse($input['arrival_date'])->format('Y-m-d');
        $input['leave_date'] = Carbon::parse($input['leave_date'])->format('Y-m-d');
        $this->travel->create($input);
        return redirect()->route('travel.index')->with('success', array('Success'=>'Travel Schedule has been added!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $travel = $this->travel->findOrFail($id);
        $user = Auth::user();
        return view('profile.travel.show', compact('user', 'travel'));
    }

    public function requestDetails(Request $request)
    {
        $travel = $this->travel->findOrFail($request->travel_id);
        foreach($travel->requests as $productRequest){
            if($productRequest->id == $request->request_id){
                $request_details = array('id'=> $productRequest->id, 'user'=>$productRequest->user->name, 'name'=>$productRequest->product_name, 'quantity'=>$productRequest->quantity, 'price'=>$productRequest->expected_price, 'link'=>$productRequest->reference_link, 'image'=> file_exists($productRequest->image) ? asset($productRequest->image) : 'http://via.placeholder.com/450?text=Product+Image', 'details'=>$productRequest->additional_details);
                return json_encode($request_details);
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $travel = $this->travel->findOrFail($id);
        $user = Auth::user();
        $countries = Countries::getListForSelect();
        return view('profile.travel.edit', compact('user', 'travel', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TravelRequest $request, $id)
    {
        $input = $request->all();
        $input['arrival_date'] = Carbon::parse($input['arrival_date'])->format('Y-m-d');
        $input['leave_date'] = Carbon::parse($input['leave_date'])->format('Y-m-d');
        $travel = $this->travel->findOrFail($id);
        $travel->update($input);
        return redirect()->route('travel.show', $id)->with('success', array('Success'=>'Travel Schedule has been updated!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $travel = $this->travel->findOrFail($id);
        $travel->delete();
        return redirect()->route('travel.index')->with('success', array('Success'=>'Travel Schedule has been deleted!'));
    }
}
