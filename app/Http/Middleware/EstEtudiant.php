<?php


namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;

class EstEtudiant
{
    public function handle(Request $request, Closure $next)
    {
        if($request->user()->estEtudiant()) {
            return $next($request);
        } else {
            abort(403,'vous n étes pas étudiant.');
        }
    }
}