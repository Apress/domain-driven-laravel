<?php

namespace Claim\Submission\Application\Http\Controllers\Estimates;

use App\Http\Controllers\Controller;
use Claim\Submission\Application\Http\Requests\Estimates\ 
	EstimateRequest;
use Claim\Submission\Domain\Models\Claims\Claim;
use Claim\Submission\Domain\Services\ClaimEstimator;
use Claim\Submission\Application\Exceptions\MissingProcedureException;
use Claim\Submission\Application\Responses\EstimateResponse;

class EstimateController extends Controller
{
	protected Claim $claim;

	public function estimate(EstimateRequest $request, 
	   ClaimEstimator $claimEstimator, Claim $claim)
	{
		$this->claim = $claim;
		$this->authorize(‘view’, $claim);

		try {
			$amount = $claimService->estimate(
				$claim, $request->cptCodes);
		} catch (MissingProcedureException $exception) {
			logger()->error(“Could not estimate given claim”);
			return $this->handleMissingProcedure();
		}
		
		return EstimateResponse::createFromEstimate(
			Estimate::create(
				$this->estimatedAmount($amount),
				$request->cptCodes
		);
	}

	public function handleMissingProcedure()
	{
		return response()->json([‘errors’ => [
			“Unknown CPTCode Combo present for Claim or Paycode
				Sheet not defined for Provider on Claim: ” . 
				$this->claim->id
			]], 422);
	}
}
