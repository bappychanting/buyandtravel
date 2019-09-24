<?php

namespace App\Http\Middleware;

use Closure;
use App\Offer;
use Illuminate\Support\Facades\Auth;

class OfferAdded
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
        $order_id = $request->route('id');
        $offer = Offer::where('order_id', $order_id)->Where('user_id', Auth::user()->id)->first();

        if($offer) return redirect(route('offers.show', $offer->id)); 

        return $next($request); 
    }
}
