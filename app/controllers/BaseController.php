<?php

class BaseController extends Controller {

    /**
     * Setup the layout used by the controller.
     *
     * @return void

    protected function setupLayout()
    {
            if ( ! is_null($this->layout))
            {
                    $this->layout = View::make($this->layout);
            }
    }
    */

    public function initTheme()
    {               
        $this->theme = Theme::uses('default')->layout('default');
        
        // NOTE: jquery should be loaded first      
        $this->theme->asset()->add('jquery', 'js/jquery.min.js');          
        $this->theme->asset()->add('bootstrap-js', 'js/bootstrap.min.js');
        $this->theme->asset()->add('core-script', 'js/scripts.js');  
       
        $this->theme->asset()->add('bootstrap-css', 'css/bootstrap.min.css');
        $this->theme->asset()->add('bootstrap-theme', 'css/bootstrap-theme.min.css');
        $this->theme->asset()->add('core-style', 'css/style.css');    
    
    }    
}
