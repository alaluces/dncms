<?php

class DncController extends BaseController {

    protected $theme;
    
    public function __construct()
    {
        $this->initTheme();      
    }  
    
    public function redirectToChecker()
    {
        // str_replace might also work here
        $phoneNumbers = implode(',', explode("\r\n", Input::get('phoneNumber')));              
        $validation = Validator::make(array('phoneNumber' => $phoneNumbers), ['phoneNumber' => 'required']);

        if ($validation->fails()) {
            return Redirect::back()->withErrors($validation->messages());                              
        }      
          
        return Redirect::to("dnc/check/$phoneNumbers");
    }   
    
    public function check($strPhoneNumbers)
    {      
        $dnc = new Dnc();
        
        $a = $dnc->checkAll($strPhoneNumbers);

        return $this->theme->of('home', $a)->render();
     
    }   
       
    public function showUpload()
    {     
          
        $a = array(
            'tabSection' => 'upload',
            'campaigns'  => Campaign::All()
        );  

        return $this->theme->of('upload', $a)->render();
    }    
    

    
    
    
}
