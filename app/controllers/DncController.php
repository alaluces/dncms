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
        $dnc = new Dnc();  
        $a   = array(
            'tabSection' => 'upload',
            'campaigns'  => $dnc->getCampaigns(),
            'dncMsgs'    => Session::get('dncMsgs')
        );  
        
        return $this->theme->of('upload', $a)->render();
    } 
    
    public function upload()
    {     
        $dncCampaignId    = Input::get('dncCampaignId');
        $phoneNumbers     = Input::get('phoneNumber'); 
        $addToVicidialDnc = Input::get('addToVicidialDnc');        
        
        $validation = Validator::make(
                array('phoneNumber' => $phoneNumbers, 'dncCampaignId' => $dncCampaignId), 
                ['phoneNumber' => 'required', 'dncCampaignId' => 'required']
        );

        if ($validation->fails()) {
            return Redirect::back()->withErrors($validation->messages());                              
        } 
        
        $dnc = new Dnc();   
        
        $a = array(            
            'dncMsgs'  => $dnc->upload($dncCampaignId, explode("\r\n", $phoneNumbers), $addToVicidialDnc)
        );       
      
        return Redirect::to('dnc/upload')->with($a); 
        //$this->theme->of('upload', $a)->render();
    }  
    
    
    

    
    
    
}
