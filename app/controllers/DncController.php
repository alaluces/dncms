<?php

class DncController extends BaseController {

    protected $theme;
    
    public function __construct()
    {
        $this->initTheme();      
    }  
    
    public function redirectToChecker()
    {
        $phoneNumber = Input::get('phoneNumber');
        return Redirect::to("dnc/check/$phoneNumber");
    }   
    
    public function check($phoneNumber)
    {     
        $a = array('phoneNumber' => $phoneNumber);   
        
        $validation = Validator::make(array('phoneNumber' => $phoneNumber), ['phoneNumber' => 'required|digits_between:9,12']);
        
        if ($validation->fails()) {
            //return Redirect::back()->with(array('phoneNumber' => $phoneNumber))->withErrors($validation->messages());
            $a['errors'] = $validation->messages();            
        }        
        
              
        return $this->theme->of('home', $a)->render();

    }    
    
    
    
    
    

}
