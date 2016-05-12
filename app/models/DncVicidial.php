<?php

class DncVicidial extends Eloquent {

    public $timestamps = false;
    protected $connection = 'mysql2';
    protected $table = 'vicidial_dnc';
    protected $primaryKey = 'phone_number';
    protected $fillable = ['phone_number'];


}