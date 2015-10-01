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
        $this->beforeFilter('auth', array('except' => 'getLogin'));
        $this->theme = Theme::uses('default')->layout('default');
        //$this->theme->asset()->usePath('default');

        $this->theme->asset()->add('core-style', 'css/bootstrap.min.css');
        $this->theme->asset()->add('core-style', 'css/bootstrap-theme.min.css');
        $this->theme->asset()->add('core-style', 'css/style.css');
        $this->theme->asset()->container('footer')->add('core-script', 'js/bootstrap.min.js');
        $this->theme->asset()->container('footer')->add('core-script', 'js/jquery.min.js');
        $this->theme->asset()->container('footer')->add('core-script', 'js/scripts.js');
    }    

    public function showWelcome()
    {
            return View::make('hello');
    }
    
    public function getLogin()
    {
        $b = array('name' => 'aries', 'lname' => 'laluces');
        
        //return View::make('login', $b);
        //$theme = Theme::uses('default')->layout('default');
        return $this->theme->of('login', $b)->render();
    }
    
    public function showHome()
    {
        echo 'home';

    }          

}
