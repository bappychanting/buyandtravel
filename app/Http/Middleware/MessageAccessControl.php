<?php

namespace App\Http\Middleware;

use Closure;
use App\MessageParticipant;
use Illuminate\Support\Facades\Auth;

class MessageAccessControl
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
        $id = $request->route('message');

        $message = MessageParticipant::where('message_subject_id', $id)->where('user_id', Auth::user()->id)->first();

        if($message) return $next($request); 

        return redirect()->back(); 
    }
}
