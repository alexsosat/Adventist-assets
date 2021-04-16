<?php

namespace App\Http\Middleware;

use Closure;
use App\Publication;

class PublicationExists
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
        $Publication = Publication::select('id')->find($request->id);

         if(isset($Publication)){
            return $next($request);
        }
        else{
            return abort(404, 'Page does not exist');
        }
    }
}
