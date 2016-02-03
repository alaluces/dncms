<?php

class HomeController extends BaseController {

    protected $theme;
    
    public function __construct()
    {
        $this->initTheme();      
    }  
    
    public function showHome()
    {
        $b = array('name' => 'aries', 'lname' => 'laluces');
  
        return $this->theme->of('home', $b)->render();
        
        //return Auth::user(); 

        
         
    }    
    
    
    
    
    

}
