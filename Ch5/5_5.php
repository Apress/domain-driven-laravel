<?php

namespace Claim\Submission\Application\Services;

class ClaimNotificationService
{
	protected $claimRepository;

	public function __construct(ClaimRepository $claimRepository)
	{
		$this->claimRepository = $claimRepository;
	}

	public function doStuff()
	{
		// do something with $this->claimRepository...
	}
}	

class ClaimRepository extends Repository
{
	public function findBy($field, $value)
	{
		return Claim::where($field, $value)->get();
	}
}

//In Listing 5-5, all that would need to happen in order to get an instance of ClaimNotificationService (without manually providing its dependency inline with wherever you actually use it) is the following:

use Claim\Submission\Application\Services\ClaimNotificationService;
// anywhere in the code where you would have access to $app — like a 
// service provider, or anywhere the helper method app() is available
$claimNoticationService = $this->app->make(
	ClaimNotificationService::class);

