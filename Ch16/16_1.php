<?php

use Claim\Validation\Domain\Rules\ClaimHasProviderAttached;
use Claim\Validation\Domain\Models\ClaimDateOfServiceIsValid;

$request->validate([
	new ClaimHasProviderAttached(),
	new ClaimDateOfServiceIsValid()
]);
