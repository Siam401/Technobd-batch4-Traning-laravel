<?php

namespace App\Http\Middleware;

use Closure;

class CheckCountry
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

        dd('Filtering Your Information');

        return $next($request);
    }
}
