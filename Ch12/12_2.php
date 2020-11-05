<?php

namespace Claim\Sumbission\Domain\Models;

use Illuminate\Database\Eloquent\Model;

/**
 *  Provider : A medical doctor 
 *  {@property array $attributes 
 *	  first_name varchar(50)
 *	  last_name varchar(60)
 *	  npi_number varchar(10)
 *	  practice_id integer(11) not null
 *	  paycode_sheet_id integer(11) not null
 *	    ...}
*/
class Provider extends Model
{
	public $table = ‘providers’;

	protected $guarded = [‘npi_number’, ‘practice_id’];

	//
}

