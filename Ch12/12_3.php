<?php

class Patient
{
  // ... 
public function setAddressAttribute(
				Address $address) {
		$this->attributes[‘address’] = $address;
	}
}
