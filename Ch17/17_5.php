<?php

namespace App\Concerns\Infrastructure\Persistence\Ports;

interface QueryCapabilities
{
	public function select($statement);
	public function delete($statement);
}
