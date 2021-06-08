<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $checkroute = $request->route()->action['as'];
        //dd($checkroute);
        if(Auth::user()->checkRole($checkroute)){
            return $next($request);
        }
        toastr()->error('You Dont Have Access');
        return redirect()->back();
        
        
    }
}
