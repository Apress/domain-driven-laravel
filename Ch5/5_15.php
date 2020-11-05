<?php

protected $listen = [
        //...
   ClaimWasSubmitted::class => [
		  NotifyAccountManager::class,
		  SendEmailSubmissionConfirmation::class,
		  \Infrastructure\Services\UpdateElasticSearch::class,
	   ];
    ];
