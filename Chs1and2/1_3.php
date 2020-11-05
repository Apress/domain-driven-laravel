<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	public $table = ‘customers’;
	protected $fillable = [‘name’,’phone’,’phone_type’];
	
	/**
	* Accessor returning the name with capital first letter
	*/
	public function getNameAttribute($name)
	{
		return ucfirst($name);
	}
	
	/**
	 * Accessor returning english version of phone_type
	*/
	public function getPhoneTypeAttribute($phone_type)
	{
		switch ($phone_type) {
			case 1:
				return “home phone”;
				break;
			case 2:
				return “cell phone”;
				break;
			case 3: 
				return “work phone”;
				break;
			default:
				throw new Exception(“shit!”);
		}
	}
}
