<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use App\Publication;
use Closure;

class publicationEditable
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

        $Publication = Publication::select('user_id')->find($request->id);

        if($Publication->user_id ==  Auth::user()->id){
            return $next($request);
        }
        else{
             return abort(403, 'Unauthorized action.');
        }
       
    }
}
