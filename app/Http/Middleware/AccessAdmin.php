<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class AccessAdmin
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
      //php artisan make:middleware AccessAdmin
      //Auth::user()->hasAnyRole('admin');
      if(Auth::user()->hasAnyRole('superadmin')){
        return $next($request);
      }

      return redirect('home');
    }
}
