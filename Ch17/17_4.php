<?php

namespace App\Domain\Contracts\Persistence\Ports;

use QueryCapabilities;

interface ExternalOrmConnection
{
	public function connect();
	public function defineQueryCapabilities( 
		QueryCapabilities $query)
}
