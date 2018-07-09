<?php

namespace App\Http\Middleware;

use Closure;
use App\Order;
use Illuminate\Support\Facades\Auth;

class MustbeOwnerofOrder
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // print_r($request->route()->parameters()); die();

             // For example, the current URL is: /orders/1/edit
        $id = $request->route('order');

        $order = Order::where('user_id', Auth::user()->id)->where('id', $id)->first();

        if($order) return $next($request); 

        return redirect()->back(); 
    }
}
