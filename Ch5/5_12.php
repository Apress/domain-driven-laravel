<?php

// most likely in a controller somewhere
public function updatePatientsProvider($patient, $provider)
{
	//dispatch the job, passing in parameters that correspond to the 
	//signature of the Job’s  handle() method
	ChangePatientPhysician::dispatch();
}
