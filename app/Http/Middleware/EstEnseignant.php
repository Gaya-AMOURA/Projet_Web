<?php


namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;

class EstEnseignant
{
    public function handle(Request $request, Closure $next)
    {
        if($request->user()->estEnseignant()) {
            return $next($request);
        } else {
            abort(403,'Vous n étes pas enseignant.');
        }
    }
}