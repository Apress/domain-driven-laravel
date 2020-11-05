<?php

use Claim\Submission\Infrastructure\Repositories\ClaimRepository;

$claimRepository = new ClaimRepository();

$latestClaims = $claimRepository->query(
	new LatestClaimSpecification(
		new \DateTimeImmutable(‘-30 days’)
	)
);
