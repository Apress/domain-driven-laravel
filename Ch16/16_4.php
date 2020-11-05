<?php

namespace App\User\Services;

class SignupUserCommand
{
	protected $username;

	protected $password;

	protected $role;

	public function __construct(Username $username,
		 Password $password, Role $role)
	{
		$this->username = $username;
		$this->password = $password;
		$this->role = $role;
	}
}
