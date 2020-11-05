<?php

use App\Models\Customer;

$customer = Customer::find(2); //retrieve customer Eric Evans
echo $customer->phone_type;
//displays “cell phone”

echo $customer->getAttribute(‘phone_type’);
//displays the raw database value, “2”
