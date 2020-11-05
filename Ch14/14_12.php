<?php

//ClaimRepositoryInterface.php
public function getProgressNotes($claimId): Collection;

public function formatDateOfService($format=’Y-m-d h:i:s’):
							 \DateTimeImmutable;

public function getEstimatedClaimAmount($claimId): float;
