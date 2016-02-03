<?php

class SessionsController extends BaseController {  
    
    public function __construct()
    {
        //$this->beforeFilter('auth', array('except' => 'create'));       
        $this->initTheme(); 
    }     
    
    public function create()
    { 
        return $this->theme->of('login')->render();
    }
    
    public function destroy()
    {
        Auth::logout();
        Session::flush();
        return Redirect::to('/');
    }    
    
    public function add()
    {
        $user = new User;
        $user->username = 'aries';
        $user->password = Hash::make('1234');
        $user->save();
  
        return User::all();
    }    
    
    public function store()
    {
        if (Auth::attempt(Input::only('username','password'))) {
            return Redirect::to('/');             
        } else {
            return 'Failed';   
        }       
    }            

}
