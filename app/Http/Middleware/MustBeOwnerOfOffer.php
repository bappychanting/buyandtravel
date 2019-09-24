<?php

namespace App\Http\Middleware;

use Closure;
use App\Offer;
use Illuminate\Support\Facades\Auth;

class MustBeOwnerOfOffer
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
        $id = $request->route('offer');

        $offer = Offer::where('user_id', Auth::user()->id)->where('id', $id)->first();

        if($offer) return $next($request); 

        return redirect()->back(); 
    }
}
