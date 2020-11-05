<?php

namespace Claim\Submission\Domain\Jobs\Claims;

use Claim\Submission\Domain\Models\Claims\Claim;
use Claim\Submission\Domain\Services\ClaimEstimator;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class EstimateClaimAmount extends ShouldQueue
{
	protected Claim $claim;

	protected $cptCodes = [];

	protected ClaimEstimator $claimEstimatorService;

	public function __construct(, 
		Claim $claim, $cptCodes=[])
	{
		$this->claim = $claim;
		$this->cptCodes = $cptCodes;
	}

	public function handle(ClaimEstimator $claimEstimator)
	{
		$claim = $this->claim;
		$cptCodes = $this->cptCodes;

		try {
			$amount = $claimEstimator->estimate(
				$claim, $cptCodes);
		} catch (MissingProcedureException $exception) {
			logger()->error(“Could not estimate given claim”);
			throw new MissingProcedureException(“ERROR MSG”);
		}
		
		$estimate = Estimate::create(
			$amount,
			$this->cptCodes
		);

		$claim->estimate_id = $estimate->id;
		$claim->save();
	]
}
