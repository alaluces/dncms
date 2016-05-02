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
        $dncMsgs    = array();
        
        
        $phoneNumbers = explode(',', $strPhoneNumbers); 
        
        foreach ($phoneNumbers as $phoneNumber) {
            $sPhoneNumber = preg_replace("/[^0-9]/", "", $phoneNumber);
            $validation = Validator::make(array('phoneNumber' => $sPhoneNumber), ['phoneNumber' => 'required|digits_between:9,12']);
            $e          = array();
            $t          = array();        
            
            if ($validation->fails()) {
                //return Redirect::to('/')->with(array('phoneNumber' => $phoneNumber))->withErrors($validation->messages());
                array_push($validationErrMsgs, "Phone number '$sPhoneNumber' is invalid");                          
            } else {
                
                $t['phone'] = $sPhoneNumber;
                
                if (DncFederal::find($sPhoneNumber)) {
                    array_push($e, 'Federal');
                }
                
                if (DncFederalState::find($sPhoneNumber)) {
                    array_push($e, 'Federal State');
                }                
                
                if (count($e) <= 0) {
                    $t['clean'] = 'Not Found';
                } else {
                    $t['err'] = $e;
                }             
                
                array_push($dncMsgs, $t);
                
                
            }            
        }
                
        $a = array(
            'tabSection' => 'home', 
            'phoneNumbers' => $phoneNumbers, 
            'dncMsgs' => $dncMsgs, 
            'dncErrors' => $validationErrMsgs
        );   

        return $this->theme->of('home', $a)->render();
    }    
    
    
    public function showUpload()
    {     
          
        $a = array(
            'tabSection' => 'upload' 

        );  

        return $this->theme->of('upload', $a)->render();
    }      
    
    
    
    

}
