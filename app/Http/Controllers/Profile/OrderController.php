<?php

namespace App\Http\Controllers\Profile;
use Session;
use App\Order;
use App\OrderImage;
use App\ProductType;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $order;
    protected $order_image;
    protected $category;
    protected $user;

    public function __construct(Order $order, OrderImage $order_image, ProductType $category, User $user)
    {
        $this->middleware('auth');
        $this->middleware('order.owner', ['only' => ['show', 'edit']]);
        $this->order = $order;
        $this->order_image = $order_image;
        $this->category = $category;
        $this->user = $user;
    }

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
            'image' => 'required|max:500'
        ]);
        $order_image = $this->order_image;
        $image = $this->uploadImage($request->file('image'), 'all_images/order_images/', 350, 300);
        $order_image->src = $image;
        $order_image->alt = "Order Image ".md5(uniqid(rand(), true));
        $order_image->order_id = $request->id;
        $order_image->save();
        Session::flash('success', array('Image has been added!'=>''));
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
        $user = Auth::user();
        $getCategories = $this->category->all();
        foreach ($getCategories as $category) {
            $categories[$category->id] = $category->product_type;
        }
        return view('profile.orders.edit', compact('user', 'order', 'categories'));
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
        $order->delete();
        return redirect()->route('orders.index')->with('success', array('Success'=>'Order has been deleted!'));
    }
}
