<?php

// In Patient model
public function setAddressAttribute(Address $address) {
    $this->attributes[‘address’] = (string)$address;
}
