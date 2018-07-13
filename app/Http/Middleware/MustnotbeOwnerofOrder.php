<?php

namespace App\Http\Middleware;

use Closure;
use App\Order;
use Illuminate\Support\Facades\Auth;

class MustnotbeOwnerofOrder
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
        $id = $request->route('id');

        $order = Order::where('id', $id)->first();

        if($order['user_id'] == Auth::user()->id){
            return redirect()->back();
        }

        return $next($request); 
    }
}
