<?php

namespace Claim\Submission\Infrastructure\Repositories;

use Claim\Submission\Domain\Contracts\ClaimRepositoryInterface;
use Claim\Submission\Domain\Contracts\ClaimSpecificationInterface;

class ClaimRepository implements ClaimRepositoryInterface
{
	public function query(ClaimSpecificationInterface $specification)
	{
		return Claim::get()->filter(
			function (Claim $claim) use ($specification) {
				return $specification->specifies($claim);
		}
	}
}
