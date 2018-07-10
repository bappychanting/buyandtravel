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
        $search = \Request::get('search');
        $from = \Request::get('from');
        $to = \Request::get('to');
        $category = \Request::get('category');
        $orders = $this->order->search($search)->orderBy('created_at', 'desc')->paginate(30);
        $categories = ProductType::all();
        return view('orders.index', compact('orders', 'categories', 'search', 'from', 'to', 'category'));
    }
}
