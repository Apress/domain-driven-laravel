<?php

namespace Discussion\Domain\Models\Groups;

use Discussion\Domain\Contracts\RoleInterface;
//additional use statements

class Member extends AbstractValue implements RoleInterface
{
	private $email;

	private $userId;
	
	private $username;

	private function __construct(Email $email, UserId $userId, 
		  					Username $username)
	{
		//any invariant checks
		$this->email = $email;
		$this->userId = $userId;
		$this->username = $username;
	}

	public static function getRoleName()
	{
		return “Member”;
	}
}
