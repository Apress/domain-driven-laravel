// ddl/app/User.php

<?php

//import the Role class so we can use it here:
use App\Models\Role;

// add the following as a new method on the User class:

public function roles()
{
	return $this->belongsToMany(Role::class, ‘role_id’, ‘user_id’);
}

