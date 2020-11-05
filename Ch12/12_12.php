<?php

use AbstractValue; 

namespace App\ValueObjects;

final class EmailAddress extends AbstractValue
{
	private $value;

	public function __construct($value)
	{
		$filteredValue = filter_var($value, FILTER_VALIDATE_EMAIL);
           if ($filteredValue === false) {
			throw new \InvalidArgumentException("Invalid argument 
				$value: Not an email address.");
	   	}
		
		$this->value = $filteredValue;
	}
}
