<?php

namespace Claim\Submission\Application\Http\Controllers;

use Claim\Validation\Domain\Rules\ClaimHasProviderAttached;
use Claim\Validation\Domain\Models\ClaimDateOfServiceIsValid;

class SubmitClaimController
{
	public function submit(ClaimSubmissionRequest $request)
	{
		$request->validate([
			new ClaimHasProviderAttached(),
			new ClaimDateOfServiceIsValid()
		]);

	$claimDto = new ClaimDTO($request->all());

	$response = $this->dispatch(new SubmitClaim($claimDto));

	return new JsonResponse($response, 200);
	}
}
