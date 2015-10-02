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
    protected $theme;
    
    public function __construct()
    {
        $this->beforeFilter('auth', array('except' => 'showLogin'));
        $this->theme = Theme::uses('default')->layout('default');
                
        // NOTE: jquery should be loaded first
        $this->theme->asset()->add('jquery', 'js/jquery.min.js');          
        $this->theme->asset()->add('bootstrap-js', 'js/bootstrap.min.js');
        $this->theme->asset()->add('core-script', 'js/scripts.js');  
        
        $this->theme->asset()->add('bootstrap-css', 'css/bootstrap.min.css');
        $this->theme->asset()->add('bootstrap-theme', 'css/bootstrap-theme.min.css');
        $this->theme->asset()->add('core-style', 'css/style.css');    
     
    }  
    
    public function showLogin()
    {
        $b = array('name' => 'aries', 'lname' => 'laluces');
  
        return $this->theme->of('home', $b)->render();
    }
    
         

}
