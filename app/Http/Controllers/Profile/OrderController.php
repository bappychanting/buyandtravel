<?php

namespace App\Http\Controllers\Profile;
use Session;
use App\User;
use App\Order;
use App\OrderImage;
use App\ProductType;
use App\AcceptedOffer;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    protected $order;
    protected $order_image;
    protected $accepted_offer;
    protected $category;
    protected $user;

    public function __construct(Order $order, OrderImage $order_image, AcceptedOffer $accepted_offer, ProductType $category, User $user)
    {
        $this->middleware('auth');
        $this->middleware('order.owner', ['only' => ['show', 'edit']]);
        $this->order = $order;
        $this->order_image = $order_image;
        $this->accepted_offer = $accepted_offer;
        $this->category = $category;
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
        $orders = $user->orders()->search($search)->orderBy('created_at', 'desc')->paginate(30);
        return view('profile.orders.index', compact('user', 'orders', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $categories = $this->category->all();
        return view('profile.orders.create', compact('user', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        $input = $request->all();
        $this->order->create($input);
        return redirect()->route('orders.index')->with('success', array('Success'=>'Order has been added!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = $this->order->findOrFail($id);
        $user = Auth::user();
        return view('profile.orders.show', compact('user', 'order'));
    }

    public function addImage(Request $request)
    {
        $this->validate(request(),[
            'image' => 'required|image|dimensions:min_width=100,min_height=200|max:500'
        ]);
        $order_image = $this->order_image;
        $image = $this->uploadImage($request->file('image'), 'all_images/order_images/', 350, 300);
        $order_image->src = $image;
        $order_image->alt = "Order Image ".md5(uniqid(rand(), true));
        $order_image->order_id = $request->id;
        $order_image->save();
        Session::flash('success', array('Image has been added!'=>''));
    }  

    public function offerDetails(Request $request)
    {
        $order = $this->order->findOrFail($request->order_id);
        foreach($order->offers as $offer){
            if($offer->id == $request->offer_id){
                $offer_details = array('id'=> $offer->id, 'user'=>$offer->user->name, 'quantity'=>$offer->product_quantity, 'price'=>$offer->asking_price, 'date'=>date('l d F Y', strtotime($offer->delivery_date)), 'details'=>$offer->additional_details);
                return json_encode($offer_details);
            }
        }
    }

    public function approveOffer(Request $request)
    {
        $input = $request->all();
        $this->accepted_offer->create($input);
        $order = $this->order->findOrFail($request->order_id);
        foreach($order->offers as $offer){
            if($offer->id == $request->offer_id){
                $this->send_notification(array($offer->user->id), 'Your offer has been accepted! Click here to check out!', route('offers.show', $offer->id));
                break;
            }
        }
        return redirect()->back()->with('success', array('Offer Accepted'=>'Offer has been accepted! The order will disappear from the front list! Rest of the offers will also disappear, remove this offer to make them reappear!'));
    }

    public function recieveOffer($id)
    {
        $accepted_offer = $this->accepted_offer->findOrFail($id);
        $accepted_offer->recieved = date("Y-m-d");
        $accepted_offer->save();
        $this->send_notification(array($accepted_offer->offer->user->id), 'Your accepted offer has been marked as recieved! Click here to check out!', route('offers.show', $accepted_offer->offer->order->id));
        return redirect()->route('orders.show', $accepted_offer->order_id)->with('success', array('Product Recieved!'=>'The product recieve date has been updated to current date!'));
    }

    public function removeAcceptedOffer($id)
    {
        $accepted_offer = $this->accepted_offer->findOrFail($id);
        $accepted_offer->delete();
        $this->send_notification(array($accepted_offer->offer->user->id), 'Your accepted offer has been removed! Click here to check out!', route('offers.show', $accepted_offer->offer->order->id));
        return redirect()->route('orders.show', $accepted_offer->order_id)->with('warning', array('Warning'=>'Accepted Offer has been Removed!'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = $this->order->findOrFail($id);
        if(empty($order->accepted)){
            $user = Auth::user();
            $getCategories = $this->category->all();
            foreach ($getCategories as $category) {
                $categories[$category->id] = $category->product_type;
            }
            return view('profile.orders.edit', compact('user', 'order', 'categories'));
        }
        return redirect()->back()->with('warning', array('This order can not be updated'=>'Once an offer has been accepted it the order cannot be updated anymore! Remove the approved offer to update it.'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request, $id)
    {
        $input = $request->all();
        $order = $this->order->findOrFail($id);
        $order->update($input);
        return redirect()->route('orders.show', $id)->with('success', array('Success'=>'Order has been updated!'));
    }

    public function deleteImage($id)
    {
        $order_image = $this->order_image->findOrFail($id);
        $order_image->delete();
        return redirect()->back()->with('success', array('Success'=>'Order image has been deleted!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = $this->order->findOrFail($id);
        if(empty($order->accepted)){
            $order->delete();
            return redirect()->route('orders.index')->with('success', array('Success'=>'Order has been deleted!'));
        }
        return redirect()->back()->with('warning', array('This order can not be deleted'=>'Once an offer has been accepted it the order cannot be deleted anymore! Remove the approved offer to delete it.'));
    }
}
