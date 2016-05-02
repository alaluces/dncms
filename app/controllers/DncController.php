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
        $validationErrMsgs = array();
        $dncMatchMsgs      = array();
        $dncNoMatchMsgs    = array();
        
        $phoneNumbers = explode(',', $strPhoneNumbers); 
        
        foreach ($phoneNumbers as $phoneNumber) {
            $validation = Validator::make(array('phoneNumber' => $phoneNumber), ['phoneNumber' => 'required|digits_between:9,12']);

            if ($validation->fails()) {
                //return Redirect::to('/')->with(array('phoneNumber' => $phoneNumber))->withErrors($validation->messages());
                array_push($validationErrMsgs, "Phone number '$phoneNumber' is invalid");                          
            } else {
                if (DncFederal::find($phoneNumber)) {
                    array_push($dncMatchMsgs, "$phoneNumber is on Federal DNC list");
                } else {
                    array_push($dncNoMatchMsgs, "$phoneNumber is not on Federal DNC list");
                }               
            }            
        }
                
        $a = array('phoneNumbers' => $phoneNumbers, 'dncMatchMsgs' => $dncMatchMsgs, 'dncNoMatchMsgs' => $dncNoMatchMsgs, 'dncErrors' => $validationErrMsgs);   

        return $this->theme->of('home', $a)->render();
    }    
    
    
    
    
    

}
