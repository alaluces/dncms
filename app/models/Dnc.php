<?php

class Dnc {

    public function checkAll($strPhoneNumbers) 
    {
        $campaigns         = Campaign::All();
        $validationErrMsgs = array();
        $dncMsgs           = array();        

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
                
                foreach ($campaigns as $campaign) {
                    if (DncCampaign::find($campaign['campaign_id'] . $sPhoneNumber)) {
                        array_push($e, $campaign['campaign_name']);
                    }
                }

                if (DncVicidial::find($sPhoneNumber)) {
                    array_push($e, 'Vicidial');
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
        
        return $a;

    }
    
    public function getCampaigns()
    {
        // I could have used Eloquent but I cant get the OrderBy method to work
        return DB::table('campaigns')->orderBy('campaign_id', 'asc')->get();       
    }       
    
    public function upload($dncCampaignId, $phoneNumbers, $addToVicidialDnc)
    {         
        $dncMsgs = array();  
        
        foreach ($phoneNumbers as $phoneNumber) {
            
            $sPhoneNumber = preg_replace("/[^0-9]/", "", $phoneNumber);
            $validation = Validator::make(
                    array('phoneNumber' => $sPhoneNumber), 
                    ['phoneNumber' => 'required|digits_between:9,12']
            );       

            if ($validation->fails()) {
                array_push($dncMsgs, array('phoneNumber' => $sPhoneNumber, 'err' => 'Invalid'));                          
            } else {                
                DncCampaign::firstOrCreate(['campaign_phone' => "$dncCampaignId$sPhoneNumber"]);              
                
                if ($addToVicidialDnc) {
                    DncVicidial::firstOrCreate(['phone_number' => $sPhoneNumber]);  
                }
                
                array_push($dncMsgs, array('phoneNumber' => $sPhoneNumber, 'msg' => 'Uploaded')); 
            }            
        }        
        
        return $dncMsgs;    
        
    }     

    public function unblock($phoneId, $managerName, $agentName, $phoneNumbers)
    {         
        $dncMsgs = array();  
        
        foreach ($phoneNumbers as $phoneNumber) {
            
            $sPhoneNumber = preg_replace("/[^0-9]/", "", $phoneNumber);
            $validation = Validator::make(
                    array('phoneNumber' => $sPhoneNumber), 
                    ['phoneNumber' => 'required|digits_between:9,12']
            );       

            if ($validation->fails()) {
                array_push($dncMsgs, array('phoneNumber' => $sPhoneNumber, 'err' => 'Invalid'));                          
            } else {                
                WhiteList::insert(['phone_number' => $phoneNumber,
                                    'username' => Auth::user()->username,                                    
                                    'manager_name' => $managerName,
                                    'agent_name' => $agentName,
                                    'sip_id' => $phoneId,
                                    'request_date' => date("Y-m-d"),
                                    'ip_address' => Request::getClientIp()]
                );
                
                array_push($dncMsgs, array('phoneNumber' => $sPhoneNumber, 'msg' => 'Unblocked for ' . $phoneId)); 
            }            
        }        
        
        return $dncMsgs;    
        
    }     
}