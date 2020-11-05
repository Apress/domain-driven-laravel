<?php

class ClaimServiceProvider {
// properties and register() method

	public function boot(ClaimRepository $claimRepository, CptCodeRepository $cptCodeRepository)
	{
		$claim = $claimRepository->findBy(‘patient_id’, 3345);
		$cptCode = $cptCodeRepository->whereIn(‘cpt_code’, 
		$claim->cpt_codes);
		//... additional logic
	}

}
