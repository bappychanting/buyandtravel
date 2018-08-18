<?php

namespace App\Http\Middleware;

use Closure;
use App\ProductRequest;
use Illuminate\Support\Facades\Auth;

class MustBeOwnerOfProductRequest
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
        $id = $request->route('request');

        $product_request = ProductRequest::where('user_id', Auth::user()->id)->where('id', $id)->first();

        if($product_request) return $next($request); 

        return redirect()->back(); 
    }
}
