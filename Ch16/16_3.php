<?php

namespace Domain\Submission\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClaimSubmissionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			 'claim.patient.first_name' => 
				'required|text|min:2',
			 'claim.patient.last_name' => 'required|text|min:2',
			 'claim.patient.dob' => 'required|date',
			 'claim.patient.medical_number' => 
				'required|integer',      
			 'claim.progress_notes' => 'required|min:1',
			 'claim.patient.documents.identification' => 
	           'required|file',
	 		'claim.patient.documents.application' => 
				'required|file'
   	    ];    
	}
}
