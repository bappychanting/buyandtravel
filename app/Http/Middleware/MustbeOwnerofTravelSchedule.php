<?php

namespace App\Http\Middleware;

use Closure;
use App\Travel;
use Illuminate\Support\Facades\Auth;


class MustbeOwnerofTravelSchedule
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

        $id = $request->route('travel');

        $travel = Travel::where('user_id', Auth::user()->id)->where('id', $id)->first();

        if($travel) return $next($request); 

        return redirect()->back();
    }
}
