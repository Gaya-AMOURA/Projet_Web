<?php


namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;

class EstAdmin
{

    public function handle(Request $request, Closure $next)
    {
        if($request->user()->estAdmin()) {
            return $next($request);
        } 
        else {
            abort(403,'Vous n étes pas administrateur.');
        }
    }
}