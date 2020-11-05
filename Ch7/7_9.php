//Listing 7-9 : Modified migration to include standardized ID’s, names and slugs

<?php

public function up()
{
	  //...
	  Role::create([
            'id'   => Role::ROLE_ADMIN,
            'name' => 'Administrator',
            'slug' => 'admin'
        ]);

        Role::create([
            'id'   => Role::ROLE_PRACTICE,
            'name' => 'Practice',
            'slug' => 'practice'
        ]);

        Role::create([
            'id'   => Role::ROLE_PROVIDER,
            'name' => 'Provider',
            'slug' => 'provider'
        ]);

        Role::create([
            'id'   => Role::ROLE_BILLER,
            'name' => 'Fqhc Biller',
            'slug' => 'fqhc-biller'
        ]);
}
