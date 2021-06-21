<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ForceHeader
{

    /**
     * @param \Iluminate\Http\Request $request
     * @param \Closure $next
     * @return mixed;
     */
   public function handle(Request $request, Closure $next)
   {
       //Forcing header to show response as json
       $request->headers->set('X-Requested-With', 'XMLHttpRequest');
       //Forcing Request
       (!$request->limit || $request->limit < 0) && $request->limit = 10;

       return $next($request);
   }
}
