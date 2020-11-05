<?php

namespace Claim\Submission\Infrastructure\Specifications;

use Claim\Submission\Domain\Contracts\ClaimSpecificationInterface;

class LatestClaimSpecification implements ClaimSpecificationInterface
{
	private $since;

	public function __construct(\DateTimeImmutable $since)
	{
		$this->since = $since;
	}

	public function specifies(Claim $claim)
	{	
		return $claim->submitted_at > $this->since;
	}
}
