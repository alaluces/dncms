<?php

class HomeController extends BaseController {

    protected $theme;
    
    public function __construct()
    {
        $this->beforeFilter('auth');
        $this->theme = Theme::uses('default')->layout('default');
  
        // NOTE: jquery should be loaded first
        $this->theme->asset()->add('jquery', 'js/jquery.min.js');          
        $this->theme->asset()->add('bootstrap-js', 'js/bootstrap.min.js');
        $this->theme->asset()->add('core-script', 'js/scripts.js');  
        
        $this->theme->asset()->add('bootstrap-css', 'css/bootstrap.min.css');
        $this->theme->asset()->add('bootstrap-theme', 'css/bootstrap-theme.min.css');
        $this->theme->asset()->add('core-style', 'css/style.css');      
    }  
    
    public function showHome()
    {
        $b = array('name' => 'aries', 'lname' => 'laluces');
  
        return $this->theme->of('home', $b)->render();
    }    
    
    
    
    
    

}
