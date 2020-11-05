// ddl/app/Models/ClaimStatus

<?php

...

class ClaimStatus 
{
	const PENDING_REVIEW = 1;
	const REVIEWER_APPROVED = 2;
	const CORRECTION_NEEDED = 3;
	const BILLER_CORRECTION_NEEDED = 4;
	const BILLER_APPROVED = 5;

	public $table = ‘claim_status’;
	protected $fillable = [‘*’];
}
