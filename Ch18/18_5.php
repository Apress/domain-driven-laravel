<?php

public function rules()
{
	return [
		‘claim’   => ‘exists:claims,id’,
		‘cptCodes’   => ‘array’,
		‘cptCodes.*’ => ‘exists:cpt_codes,id’
	];
}
