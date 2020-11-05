<?php

namespace Claim\Submission\Domain\Contracts;
use Claim\Submission\Domain\Models\Claim;
use ClaimSpecificationInterface;

interface ClaimRepositoryInterface
{
    public function query(ClaimSpecificationInterface $specification);
}
