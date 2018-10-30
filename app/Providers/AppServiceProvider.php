<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        app('view')->composer('*', function ($view) {
            $action = app('request')->route()->getAction();
    
            $controller = class_basename($action['controller']);
    
            list($ucontroller, $uaction) = explode('Controller@', $controller);
           // dd($ucontroller);

            $view->with(compact('ucontroller', 'uaction'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
