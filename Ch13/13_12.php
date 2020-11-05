<?php 
//some namespace
use Spatie\DataTransferObject;

class Data extends DataTransferObject
{
    public $id;
    public $fname;
    public $lname;
    public $role_id;
    public $address;
    public $city;
    public $state;
    public $zip;
    public $created_at;
    public $updated_at;
}
