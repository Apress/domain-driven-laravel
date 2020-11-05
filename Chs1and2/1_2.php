<?php

use App\Models\Customer;

$customer = Customer::first(); //gets the first in the db
					   //(with the lowest id)
echo $customer->phone;
//returns “6197779125”

echo $customer->phone_type;
//returns “1”

