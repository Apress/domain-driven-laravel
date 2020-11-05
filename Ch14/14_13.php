<?php

$claim = Claim::find(123);
$progressNotes = $claim->progressNotes->toArray();
$dateOfService = \DateTime::format($claim->dateOfService, ‘m-d-Y’);
$estimatedClaimAmount = $claim->estimated_claim_amount;
