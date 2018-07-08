<?php

namespace App\Http\Controllers\Profile;
use App\Order;
use App\OrderImages;
use App\ProductType;
use App\User;
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

    public function __construct(Order $order, OrderImages $user, ProductType $category, User $user)
    {
        $this->middleware('auth');
        $this->order = $order;
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
        /*
        $order = $this->order->find($id);
        if($order == null){
            return redirect()->back()->with('error', array('Empty Result'=>'Your requested order does not exist!'));
        }
        */
        $order = $this->order->findOrFail($id);
        $user = Auth::user();
        return view('profile.orders.show', compact('user', 'order'));
    }

    public function addImage(OrderRequest $request)
    {
        $this->validate(request(),[
            'image' => 'required|max:500'
        ]);

        /*$package = $this->packages;
        $package->content = json_encode(['title' => $request->title ]);
        $package->description = $request->description;
        $package->release_date = $request->release_date;
        $package->price = $request->price;
        $package->save(); */

        $image = $this->uploadImage($request->file('image'), 'all_images/avatars/', 450, 450);
        $user->avatar = $image;
        $user->save();
        session()->put('image', 'Avatar successfully updated!');
        return redirect(route('user.userinfo'));
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
