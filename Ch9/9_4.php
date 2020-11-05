<?php

namespace Claim\Submission\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class PaycodeSheet extends Model
{
	public function center()
	{
		return $this->belongsToOne(Center::class);
	}
}
