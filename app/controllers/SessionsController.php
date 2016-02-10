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
        $user->username = 'aries2';
        $user->password = Hash::make('1234');
        $user->save();
  
        return User::all();
    }    
    
    public function store()
    {
        
        $validation = Validator::make(Input::all(), ['username' => 'required|min:5', 'password' => 'required|min:4']);
        
        if ($validation->fails()) {
            return Redirect::back()->withInput()->withErrors($validation->messages());
        }
        
        if (Auth::attempt(Input::only('username','password'))) {
            return Redirect::to('/');             
        } else {            
            return Redirect::back()->withInput()->withErrors(['login' => 'Incorrect username or password']);  
        }       
    }            

}
