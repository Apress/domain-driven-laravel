<?php

namespace App\User\Domain\Listeners;

use App\User\Domain\Events\PatientWasCreated;

class AddPatientToElasticsearch
{
	private EsRepository $esRepository;

	public function __construct(ESRepository $esRepository)
	{
		$this->esRepository = $esRepository;
	}

	public function handle(PatientWasCreated $event)
	{
		//get data to event store (database)
		$patientDetails = $event->getEventBody();
		//store them in Elasticsearch via a call to its repository
		$this->esRepository>addToIndex(‘patients',$patientDetails);
		//reindex the patient index
		$this->esRepository::reindex(‘patients’);
	}
}
