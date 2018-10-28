<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;
class CheckRole 
{
    /**
     * Handle an incoming request.
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next)
    {
        $routeArray = app('request')->route()->getAction();
        $controllerAction = class_basename($routeArray['controller']);
        list($controller, $action) = explode('Controller@', $controllerAction);
            if (Auth::user()->GetAuthTable($controller, $action)==false) 
            {
                abort(403, '', ['Location' => '/errors']);
            }
        return $next($request);
    }
}
