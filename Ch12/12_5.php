<?php

//within the Patient Model 

public function getAddressAttribute($address)
{
	return new Address($address);
} 
