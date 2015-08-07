<?php

namespace App\Http\Middleware;

use Closure;

class VerifyPermissions
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
        $name = strtoupper($request->route()->getName());

        if( ! $this->auth->user()->can($name))
        {
            Flash::error('You do not have permission to access transaction ' . $name );

            return back();
        }
        return $next($request);
    }
}
