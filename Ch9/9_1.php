// ddl/Claim/Submission/Domain/Models/CptCode.php

<?php

namespace Claim\Submission\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class CptCode extends Model
{
    public $table = 'cpt_codes';

    protected $guarded = ['id'];

    public function cptCodeCombos()
    {
        return $this->belongsToMany(CptCodeCombo::class,
'cpt_code_combo_lookup');
    }
}
