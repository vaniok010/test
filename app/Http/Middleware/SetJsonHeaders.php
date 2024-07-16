<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetJsonHeaders
{
    public function handle(Request $request, Closure $next): mixed
    {
        $request->headers->set('Accept', 'application/json');

        if (empty($request->headers->get('Content-Type'))) {
            $request->headers->set('Content-Type', 'application/json');
        }

        return $next($request);
    }
}
