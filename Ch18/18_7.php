<?php

namespace Claim\Submission\Application\Http\Controllers\Estimates;

use App\Http\Controllers\Controller;
use Claim\Submission\Application\Http\Requests\Estimates\ 
	EstimateRequest;
use Claim\Submission\Domain\Models\Claims\Claim;
use Claim\Submission\Domain\Services\ClaimEstimator;
use Claim\Submission\Domain\Jobs\Claims\EstimateClaimAmount;
use Claim\Submission\Application\Responses\EstimateResponse;

class EstimateController extends Controller
{
	protected ClaimEstimator $claimEstimator;

	public function __construct(ClaimEstimator $claimEstimator)
	{
		$this->claimEstimator = $claimEstimator;
	}

	public function estimate(EstimateRequest $request, Claim $claim)
	{
		$claim = $this->claim;
		$cptCodes = $this->cptCodes;

		$this->authorize(‘view’, $claim);

		dispatch(new EstimateClaimAmount($claim, $this->cptCodes);

		//refresh the Claim since we dispatched it to the queue
		$claim = $claim->fresh();

		//create a response by fetching the new estimate from DB
		return (!is_null($claim->estimate_id)) ? 
			EstimateResponse::createFromEstimate(
				 Estimate::find($claim->estimate_id))
			: response()->make([‘success’ => ‘false’], 500);
	}
}
