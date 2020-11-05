// ddl/app/Role.php

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const ROLE_ADMIN = 1;
    const ROLE_PRACTICE = 2;
    const ROLE_PROVIDER = 3;
    const ROLE_BILLER = 4;

    protected $fillable = ['name', 'slug'];
}
