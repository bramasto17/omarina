<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class SessionAuth
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
        if (!session()->exists('Auth')) {
            // user value cannot be found in session
            return redirect('/admin/');
            //return response()->json(session()->get('Auth'));
        }
        else{
            return $next($request);    
        }

        
    }
}
