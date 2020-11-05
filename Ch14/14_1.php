<?php 

use Carbon\Carbon;

$startDate = Carbon::parse(‘-4weeks’)->toDateTimeString();
$endDate = Carbon::parse(‘today’)->toDateTimeString();

$totalAmountOfPatientsClaims = Claim::where(‘patient_id’, $patientId)
			->where(‘claim.state’, PendingReview::class)
			->whereBetween(‘submitted_at’, [$startDate, $endDate])
			->pluck(‘estimated_claim_amount’)
			->get()
			->sum();
