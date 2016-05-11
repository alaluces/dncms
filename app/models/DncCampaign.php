<?php

class DncCampaign extends Eloquent {
    
    public $timestamps = false;
    protected $table = 'dnc_list_campaigns2';
    protected $primaryKey = 'campaign_phone';    
    protected $fillable = ['campaign_phone'];


}