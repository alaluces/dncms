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
        $this->initTheme();      
    }     
  
    
    public function showChangePw()
    {
        return $this->theme->of('changepw', ['a' => Session::get('msg')])->render();
    } 
    
    public function changePw()
    {            
        $validation = Validator::make(Input::all(), [
            'currentPassword' => 'required|min:3', 
            'newPassword1' => 'required|min:6',
            'newPassword2' => 'required|min:6'
            ]);

        if ($validation->fails()) {
            return Redirect::back()->withInput()->withErrors($validation->messages());
        }
        
        $currentPassword  = Input::get('currentPassword');
        $newPassword1 = Input::get('newPassword1'); 
        $newPassword2 = Input::get('newPassword2');         
        
        if ($newPassword1 != $newPassword2) {
            return Redirect::back()->withErrors(['changepw' => 'Passwords do not match']);  
        }       
         
        $user = Auth::user();
        if (!Hash::check($currentPassword, $user->password)) {
            return Redirect::back()->withErrors(['changepw' => 'Current password is incorrect']); 
        }       
        
        $user->password = Hash::make($newPassword2);
        $user->save(); 
              
        return Redirect::to('changepw')->with('msg' , 'Change password success');      
        
    }
    
}
