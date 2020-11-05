<?php

class ChangePatientPhysician implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $patientProviderRepository;

    /**
     * Create a new job instance.
     *
     * @param  Patient $patient
     * @param  Provider $newProvider
     * @return void
     */
    public function __construct( PatientProviderRepository 
		$patientProviderRepository)
    {
        $this->patientProviderRepository = $patientProviderRepository;
    }
    
    /**
	* Execute the job.
	*
     * @return void
     */
    public function handle(Patient $patient, Provider $newProvider)
    {
  	   //verify this patient is registered under this provider 
	   $isRegistered = $this->patientProviderRepository
		    		        ->patientRegisteredFor(
						   $patient, $provider);
	   if ($isRegistered) {
		   $patient->provider()->associate($provider);
		   $patient->save();
	   } else {
 		    throw new PatientNotRegisteredWithProviderException();
	   }
    }
}
