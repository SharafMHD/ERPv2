<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;
class CheckRole 
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
      
    //     $routeArray = app('request')->route()->getAction();
    //     $controllerAction = class_basename($routeArray['controller']);
    //     list($controller, $action) = explode('Controller@', $controllerAction);
    //     $modelid=App/Models/models::FirstOrCreate(['name'=>$controller]);
    //     $actionid=App/Models/actions::FirstOrCreate(['name'=>$action,'model'=>$modelid->id]);
    // //    dd($actionid.' -'.$action.'_'.$modelid);
    //     $privileges =App/Models/privileges::where('action',$actionid->id)->where('role', Auth::user()->role)->where('model', $modelid->id)->count();
    //     if ( $privileges == 0)
    //             { 
    //                 // Flash::error('Acsses denide.');
    //                 return redirect('home');
    //             }
    
    // $routeArray = app('request')->route()->getAction();
    // $controllerAction = class_basename($routeArray['controller']);
    // list($controll, $action) = explode('@', $controllerAction);
    // $controller =str_replace("Controller", "", $controll);

    // // dd($controller);
   Auth::user()->ifautherd();

        return $next($request);
    }
}
