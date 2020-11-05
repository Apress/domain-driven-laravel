// dll/app/Models/Claim.php

<?php
// ...
namespace App\Models;

class Claim
{	
	public $table = ‘claims’;	

	protected $fillable = [‘cpt_code_combo_id’, ’provider_id’, ’patient_id’, ‘progress_note_id’, ‘date_of_service’, ‘status_id’];

//relations:
	public function provider()
	{
		return $this->hasOne(Provider::class);
	}

	public function patient()
	{
		return $this->hasOne(Patient::class);
	}

	public function progressNotes()
	{
		return $this->hasMany(ProviderNote::class);
	}

	public function cptCodeCombo()
	{
     		return $this->hasOne(CptCodeCombo::class);
	}

	public function status()
	{
	     return $this->hasOne(ClaimStatus::class, ‘status_id’, ‘id’);
	}

}
