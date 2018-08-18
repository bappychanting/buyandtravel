<?php

namespace App\Http\Middleware;

use Closure;
use App\ProductRequest;
use Illuminate\Support\Facades\Auth;

class ProductRequestAdded
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
        $travel_id = $request->route('id');
        $product_request = ProductRequest::where('travel_schedule_id', $travel_id)->Where('user_id', Auth::user()->id)->first();

        if($product_request) return redirect(route('requests.show', $product_request->id)); 

        return $next($request);
    }
}
