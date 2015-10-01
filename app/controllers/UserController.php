<?php

class UserController extends BaseController {

    /*
    |--------------------------------------------------------------------------
    | Default Home Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |	Route::get('/', 'HomeController@showWelcome');
    |
    */
    
    public function __construct()
    {
        $this->beforeFilter('auth', array('except' => 'getLogin'));
    }    

    public function showWelcome()
    {
            return View::make('hello');
    }
    
    public function getLogin()
    {
        $b = array('name' => 'aries', 'lname' => 'laluces');
        
        return View::make('twig', $b);
    }
    
    public function showHome()
    {
        echo 'home';

    }          

}
