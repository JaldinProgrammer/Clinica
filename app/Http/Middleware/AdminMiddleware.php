<?php

namespace App\Http\Middleware;

use App\Models\Permission;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AdminMiddleware
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

        $usuario = Permission::where('role_id',2)->where('user_id',Auth::user()->id)->where('status',1)->get();
        if(sizeof($usuario)!=0) // if it's not empty
         return $next($request);
         return redirect()->back();
    }
}
