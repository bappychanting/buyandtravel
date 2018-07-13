<?php

namespace App\Http\Controllers;
use PDF;
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
        $product_type = $request->product_type;
        $from = $request->from;
        $to = $request->to;
        if(isset($from) && isset($to)){
        	$orders = $this->order->search($keyword)->search($product_type)->whereBetween('created_at', [date('Y-m-d', strtotime($from)), date('Y-m-d', strtotime($to))])->orderBy('created_at', 'desc')->paginate(30);
        }else{
            $orders = $this->order->search($keyword)->search($product_type)->orderBy('created_at', 'desc')->paginate(30);
        }
        $categories = ProductType::all();
        return view('orders.index', compact('orders', 'categories', 'keyword', 'product_type', 'from', 'to'));
    }

    public function show($id)
    {
        /*
        $order = $this->order->find($id);
        if($order == null){
            return redirect()->back()->with('error', array('Empty Result'=>'Your requested order does not exist!'));
        }
        */
        $order = $this->order->findOrFail($id);
        $categories = ProductType::all();
        return view('orders.show', compact('order', 'categories'));
    }

    public function downloadPDF($id)
    {
        $order = $this->order->findOrFail($id);
        $pdf = PDF::loadView('pdf.order', compact('order'));
        return $pdf->download($order->product_name.'_'.$order->user->name.'_'.date('d F Y', strtotime($order->created_at)).'.pdf');
    }
}
