<?php

namespace App\Http\Controllers\Profile;
use Carbon\Carbon;
use App\Offer;
use App\User;
use App\Http\Requests\OfferRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $offer;
    protected $user;

    public function __construct(Offer $offer, User $user)
    {
        $this->middleware('auth');
        $this->offer = $offer;
        $this->user = $user;
    }

    public function index()
    {
        $user = $this->user->find(Auth::user()->id);
        $search = \Request::get('search');
        $offers = $user->offers()->search($search)->orderBy('created_at', 'desc')->paginate(30);
        // print_r($offers); die();
        return view('profile.offers.index', compact('user', 'offers', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect(route('front.orders.index'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OfferRequest $request)
    {
        $input = $request->all();
        $input['delivery_date'] = Carbon::parse($input['delivery_date'])->format('Y-m-d');
        $this->offer->create($input);
        return redirect(route('offers.index'));
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
    public function update(OfferRequest $request, $id)
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
