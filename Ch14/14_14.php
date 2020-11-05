<?php
//Saving relations to a Claim model

$claim = Claim::find(123)
		->cptCodes()
		->save([22,45,47]);

//Query relations of Claim model
//find a Claim’s progress notes and chain additional query operations

$claim = Claim::where(function ($query) use ($provider) {
	$query->whereHas('progress_notes', function ($query) use 
		($provider) {
			$query->where(‘provider_id’, $provider->id);
	});	
});

