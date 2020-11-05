<?php

namespace Claim\Submission\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    public function practices()
    {
        return $this->hasMany(Practice::class);
    }

    public function providers()
    {
        return $this->hasManyThrough(Provider::class, Practice::class);
    }
}
