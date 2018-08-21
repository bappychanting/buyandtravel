<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;

class MustBeOwnerOfNotification
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
        /*$id = $request->route('id');

        $offer = Offer::where('user_id', Auth::user()->id)->where('id', $id)->first();

        if($offer) return $next($request); 

        return redirect()->back();*/ 

        print_r($request->route('id')); die();
    }
}
