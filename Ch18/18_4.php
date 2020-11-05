<?php

namespace Claim\Submission\Application\Http\Requests\Estimates;

use App\Http\Requests\Request;

class EstimateRequest extends Request
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		return [
			‘claim’ => ‘exists:claims,id’
		];
	}
}
