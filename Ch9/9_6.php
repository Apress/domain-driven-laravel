<?php 

namespace Claim\Submission\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
   public function patients()
    {
        return $this->hasMany(Patient::class);
    }

    public function paycodeSheet()
    {
        return $this->hasOne(PaycodeSheet::class);
    }

    public function practice()
    {
        return $this->belongsTo(Practice::class);
    }
}

