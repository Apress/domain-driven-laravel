<?php

namespace App\User\Domain\Models;

use App\User\Domain\Events\PatientWasCreated;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Patient extends Authenticatable 
{
	protected $dispatchedEvents = [
		‘created’ => PatientWasCreated::class,
		‘updated’ => PatientWasUpdated::class
	];
}
