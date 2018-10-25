<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models as db;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function menu()
    {
        $menu =[];
            foreach (db\models::all() as $men ) { 
                    if ($men->parent==null) {
                        $arrayName = array('name' =>$men->name, 'actions' =>$men->actions() );
                        $menu[]= $arrayName ;
                    }
            }
        return db\models::all();
    }

    public function isauther($action,$model)
    {
        $privileges =db\privileges::all()->where('action',$action)->where('role', Auth::user()->role)->first();
       
       
        if ( $privileges>0)
        { 
            
  
            return true ;}
          else {
        return false;}
    }
    public function isautherd($action,$model)
    {
        $modelid=db\models::where('name',$model)->first()->id;
        $actionid=db\actions::where('name',$action)->where('model',$modelid)->first();
        //Log::debug('Modid.'.$modelid.' Modname.'.$model);
            if (isSet($actionid) && isSet($modelid)) 
                { 
                    $privileges =db\privileges::where('action',$actionid->id)->where('role', Auth::user()->role)->where('model', $modelid)->count();
                    if ( $privileges > 0)
                            { 
                                return true;
                            }
                        else
                            {
                                return false;
                            } 
                }
                else 
                 {
                            return false;
                 }
    }

    public function ifautherd()
    {
        //dd('sdfsdfs');
        $routeArray = app('request')->route()->getAction();
        $controllerAction = class_basename($routeArray['controller']);
        list($controller, $action) = explode('Controller@', $controllerAction);
        $modelid=db\models::FirstOrCreate(['name'=>$controller]);
        $actionid=db\actions::FirstOrCreate(['name'=>$action,'model'=>$modelid->id]);
        $privileges =db\privileges::where('action',$actionid->id)->where('role', Auth::user()->role)->where('model', $modelid->id)->count();
        
        if ( $privileges == 0)
                { 
                    // return redirect('error.403');
                    abort(403, '', ['Location' => '/errors']);

                }
     }


         public function checked($role,$action,$model)
         {
                         $privileges =db\privileges::where('action',$action)->where('role', $role)->where('model', $model)->count();
                         if ( $privileges > 0)
                                 { 
                                     return 'checked';
                                 }
                             else
                                 {
                                     return 'not';
                                 } 
                   
         }


}
