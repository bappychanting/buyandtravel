<?php

namespace App\Http\Controllers;

use App\Order;
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
        $orders = $this->order->search($search)->orderBy('created_at', 'desc')->paginate(30);
        return view('orders.index', compact('orders'));
    }
}
