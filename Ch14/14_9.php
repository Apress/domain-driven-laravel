<?php

//ClaimRepository
public function submittedWithinRange($startDate, $endDate)
{
	Return Claim::whereBetween(
 		"submitted_at", [
			Carbon::parse("today-1 year")->toDateTimeString(),        
			Carbon::parse(“today”)->toDateTimeString()
   		]
	);
}
