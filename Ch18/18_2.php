<?php

namespace Claim\Submission\Domain\Services;

use Claim\Submission\Domain\Models\Providers\Provider;
use Claim\Submission\Domain\Models\PaycodeSheets\PaycodeSheet;
use Claim\Submission\Domain\Models\Payment\PaymentType;
use Claim\Submission\Domain\Models\Payment\PaymentData;
use Claim\Submission\Domain\Models\CptCodes\CptCodeCombo;
use Claim\Submission\Domain\ValueObjects\Estimate\Estimate;
use Claim\Submission\Domain\Services\Payment\ClaimPaymentService;
Use Claim\Submission\Domain\Exceptions\
	ComboNotFoundInPaycodeSheetException;

class ClaimEstimator
{
	protected Provider $provider;
	
 	protected CptCodeCombo $cptCodeComboRepository;

	protected PaycodeSheet $paycodeSheetRepository;

	protected ClaimPaymentService $claimPaymentService;

	public function __construct(
		PaycodeSheetRepository $paycodeSheetRepository, 
		CptCodeComboRepository $cptCodeComboRepository,
		ClaimPaymentService $claimPaymentService}
	{
		$this->paycodeSheetRepository = $paycodeSheetRepository;
		$this->cptCodeComboRepository = $cptCodeComboRepository;
		$this->claimPaymentServices = $claimPaymentServices;
	}

	public function estimate(Claim $claim, array $codes): float
	{
		$provider = $claim->primaryProvider();
		$estimateDate = $claim->estimateDate()->toDateTimeString();
		
		//we need to take into account the two different payment 
	     //types described above : Per-Procedure and Per-Visit
		$paymentType = $this->findPaymentData($provider);

		if ($paymentType === PaymentType::PER_VISIT) {
			return $provider->fee_per_visit * $provider->bonus;
		} else {
			return $this->calculatePerProcedureEstimate(
				$provider, $claim, $codes);
		}
	}

	public function findPaymentData(Provider $provider): PaymentData
	{
		//this way we can add additional payment types with ease:
		return PaymentType::fromRequest ($provider->paymentType);
	}

	public function calculatePerProcedureEstimate(
		Provider $provider, Claim $claim, $codes=[])
	{
		if (!empty($codes)) {
			$cptCodeCombo = $this->cptCodeComboRepository
                                     ->findComboFromCodes($codes);

			$paycodeSheet = $this->paycodeSheetRepository
                     	 	          ->byProvider($provider->id);

			$estimatedAmount = $this->claimPaymentService
			   ->lookupPriceForCombo(
					$paycodeSheet, $provider, $cptCodeCombo);
			if (!is_float($estimatedAMount)) {
				throw new \ComboNotFoundInPaycodeSheetException;
			} 
			
			return new Estimate($estimatedAmount, $codes);
		}
	}
}
