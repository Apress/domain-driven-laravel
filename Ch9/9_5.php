<?php

namespace Claim\Submission\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class PaycodeSheet extends Model 
{
   public function provider()
    {
        return $this->hasOne(Provider::class);
    }

    public function cptCodeCombos()
    {
        return $this->hasOne(CptCodeCombo::class);
    }

    public function center()
    {
        return $this->hasOneThrough(Center::class, Provider::class);
    }
}
