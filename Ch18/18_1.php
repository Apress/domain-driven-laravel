<?php

namespace Claim\Submission\Domain\ValueObjects\Estimates;

class Estimate
{
	private float $amount;
	private $codes = [];

	public function __construct(float $amount, array $codes=[])
	{
		$this->amount = $amount;
		$this->codes = $codes;
	}

	public function create($amount, array $codes=[]): Estimate
	{
		return new self($amount, $codes);
	}

	public function setAmount(float $amount)
	{
		$this->amount = $amount;
		return $this;
	}


	public function setCodes(array $codes): Estimate
	{
		$this->codes = $codes;
	}

	public function amount(): array
	{
		return is_null($this->amount) ? null : (float) 
			$this->amount;
	}	

	public function codes(): float 
	{
		return $this->codes;
	}		
}
