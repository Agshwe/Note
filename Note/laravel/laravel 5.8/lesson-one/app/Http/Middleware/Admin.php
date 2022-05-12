<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
        //dd("I am Admin");

        if(Auth::id() !==202){
            //return abort(404); //404 not found or 505
              return redirect()->route('denied');
        }
        return $next($request);
    }
}
