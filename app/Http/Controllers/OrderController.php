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

    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $from = $request->from;
        $to = $request->to;
        $paginate = 1;
        $orders = $this->order->search($keyword)->orderBy('created_at', 'desc')->paginate($paginate);
        if(isset($from) && isset($to)){
        	$orders = $this->order->search($request->keyword)->whereBetween('created_at', [date('Y-m-d', strtotime($from)), date('Y-m-d', strtotime($to))])->orderBy('created_at', 'desc')->paginate($paginate);
        }
        $categories = ProductType::all();
        return view('orders.index', compact('orders', 'categories', 'keyword', 'from', 'to'));
    }
}
