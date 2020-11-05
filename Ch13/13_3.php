<?php
namespace App\User\Domain\Events;

use Illuminate\Queue\SerializesModels;
use App\User\Domain\Models\Patient;

class PatientWasCreated extends DomainEvent
{
	use SerializesModels;

	public PatientDetails $patientDetails;

	public function __construct(PatientDetails $patientDetails)
	{
		$this->model = Patient::class;
	}

	public class getEventBody()
	{
		return (string)$this->patientDetails;
	}
}
