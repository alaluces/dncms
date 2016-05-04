<?php

class DncVicidial extends Eloquent {

    protected $connection = 'mysql2';
    protected $table = 'vicidial_dnc';
    protected $primaryKey = 'phone_number';      


}