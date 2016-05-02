<?php

class HomeController extends BaseController {

    protected $theme;
    
    public function __construct()
    {
        $this->initTheme();      
    }  
    
    public function showHome()
    {
        $a = array(
            'tabSection' => 'home' 

        );  
  
        return $this->theme->of('home', $a)->render();
        
        //return Auth::user(); 

        
         
    }    
    
    
    
    
    

}
