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
        $this->middleware('offer.owner')->only('show', 'edit');
        $this->offer = $offer;
        $this->user = $user;
    }

    public function index()
    {
        $user = $this->user->find(Auth::user()->id);
        $search = \Request::get('search');
        $offers = $user->offers()->search($search)->orderBy('created_at', 'desc')->paginate(30);
        return view('profile.offers.index', compact('user', 'offers', 'search'));
    }

    public function accepted()
    {
        $user = $this->user->find(Auth::user()->id);
        $search = \Request::get('search');
        $offers = $user->offers()->where('accepted', '=', 1)->search($search)->orderBy('created_at', 'desc')->paginate(30);
        return view('profile.offers.approved', compact('user', 'offers', 'search'));
    }

    public function rejected()
    {
        $user = $this->user->find(Auth::user()->id);
        $search = \Request::get('search');
        $offers = $user->offers()->where('rejected', '=', 1)->search($search)->orderBy('created_at', 'desc')->paginate(30);
        return view('profile.offers.rejected', compact('user', 'offers', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect(route('front.orders.index'))->with('info', array('To Add Offer'=>'Please select one of the following orders to add offer!'));
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
        return redirect(route('offers.index'))->with('success', array('Offer Added'=>'Offer has been added and delivered to the ordering user!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $offer = $this->offer->findOrFail($id);
        $user = Auth::user();
        return view('profile.offers.show', compact('user', 'offer'));
    }

    public function approve($id)
    {
        $offer = $this->offer->findOrFail($id);
        if(Auth::user() && Auth::user()->id == $offer->order->user->id){
            $offer->accepted = 1;
            $offer->save();
        }
        return redirect()->route('orders.show', $offer->order_id)->with('success', array('Offer Accepted'=>'Offer has been accepted! Rest of the offers will disappear, to make them reappear reject this offer!'));
    }

    public function reject($id)
    {
        $offer = $this->offer->findOrFail($id);
        if(Auth::user() && Auth::user()->id == $offer->order->user->id){
            $offer->accepted = 0;
            $offer->rejected = 1;
            $offer->save();
        }
        return redirect()->route('orders.show', $offer->order_id)->with('success', array('Offer Rejected'=>'Offer has been rejected! It may show up again if the offerer updates the offer!'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $offer = $this->offer->findOrFail($id);
        $user = Auth::user();
        return view('profile.offers.edit', compact('user', 'offer'));
    }

    public function deliver(OfferRequest $request)
    {
    }

    public function recieve(OfferRequest $request)
    {
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
        $input = $request->all();
        $input['delivery_date'] = Carbon::parse($input['delivery_date'])->format('Y-m-d');
        $offer = $this->offer->findOrFail($id);
        $offer->update($input);
        return redirect()->route('offers.show', $id)->with('success', array('Success'=>'Offer has been updated!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $offer = $this->offer->findOrFail($id);
        $offer->delete();
        return redirect()->route('offers.index')->with('success', array('Success'=>'Offer has been deleted!'));
    }
}
