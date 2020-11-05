<?php

namespace Claim\Submission\Domain\Contracts;

use Claim\Submission\Domain\Models\Claim;

interface ClaimSpecificationInterface
{
	public function specifies(Claim $claim);
}
