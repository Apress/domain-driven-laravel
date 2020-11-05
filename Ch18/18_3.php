<?php
                                                                                                                                                                                                                                                                                                                                                                                                   
//inside the Estimate value object (Listing 18-1)
use Claim\Submission\Domain\Models\Payment\PaymentType;                                                      

class PaymentType extends Model
{
	const PER_VISIT = 1;
	const PER_PROCEDURE = 2;
	
	public static function fromRequest(int $payType): PaymentType
	{
		return new self($payType);
	}
}
