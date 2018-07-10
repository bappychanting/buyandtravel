<?php

namespace App\Http\Controllers;
use App\Order;
use App\ProductType;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function index()
    {
        $orders = $this->order->orderBy('created_at', 'desc')->paginate(30);
        $categories = ProductType::all();
        return view('orders.index', compact('orders', 'categories'));
    }

    public function search(Request $request)
    {
        $this->validate($request, [
            'keyword' => 'required|string',
            'from' => 'required|string',
            'to' => 'required|string',
        ]);
        $product_type = $request->product_type;
        $orders = $this->order->search($request->keyword)->whereBetween('created_at', [date('Y-m-d', strtotime($request->from)), date('Y-m-d', strtotime($request->to))])->orderBy('created_at', 'desc')->paginate(1);	
        $categories = ProductType::all();
        return view('orders.index', compact('orders', 'categories', 'keyword', 'from', 'to', 'product_type'));
    }
}
