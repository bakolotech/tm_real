<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AccountConfirmed
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
        $user = $request->user();
        if(!is_null($user->email_verified_at) && strtotime($user->email_verified_at) <= time()){
            return $next($request);
        }
        else{
            Auth::logout();
            return redirect('/')->with('message', [1, "Votre compte n'a pas été confirmé. Veuillez consulter vos message dans ". $user->email]);
        }
    }
}
