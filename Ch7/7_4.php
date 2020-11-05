// ddl/app/Models/Provider

<?php

...

Class Provider extends Model
{
	public $table = ‘providers’;

	protected $fillable = [‘fname’, ‘lname’, ‘address’, ‘practice_id’, ‘npi_number’];

	public function practice()
	{
		return $this->hasOne(Practice::class, ‘practice_id’, ‘id’);
	}
}
