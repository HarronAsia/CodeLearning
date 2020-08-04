<?php

namespace App\Http\Middleware;

use Closure;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
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
        if ($request->user() && $request->user() != 'admin') {
            return new Response(view('unauthorized')->with('name', 'ADMIN'));
        }
        return $next($request);
    }
}
