<?php

namespace Claim\Submission\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
	public function paycodeSheet()
	{
		return $this->hasOne(PaycodeSheet::class);
	}
}
