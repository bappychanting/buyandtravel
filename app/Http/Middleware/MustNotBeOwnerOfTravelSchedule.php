<?php

namespace App\Http\Middleware;

use Closure;
use App\Travel;
use Illuminate\Support\Facades\Auth;

class MustNotBeOwnerOfTravelSchedule
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

        $travel = Travel::where('id', $id)->first();

        if($travel['user_id'] == Auth::user()->id){
            return redirect()->back();
        }

        return $next($request); 
    }
}
