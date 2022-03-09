<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;


class admin
{
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->type_id==2){
                return back();
        }
        return $next($request);
    }
}
