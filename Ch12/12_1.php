<?php

namespace Claim\Sumbission\Domain\Models;

use Illuminate\Database\Eloquent\Model;
class Provider extends Model
{
	public $table = ‘providers’;

	protected $guarded = [‘npi_number’, ‘practice_id’];
}

