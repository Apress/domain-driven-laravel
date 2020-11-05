<?php

namespace Claim\Submission\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class Practice extends Model
{
    public function center()
    {
        return $this->belongsTo(Center::class);
    }

    public function providers()
    {
        return $this->hasMany(Provider::class);
    }
}
