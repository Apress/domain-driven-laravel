<?php
namespace Discussion\Domain\Services\Groups;

use Discussion\Domain\Models\Groups\Admin;
use Discussion\Domain\Models\Groups\Member;
use Discussion\Domain\Models\Groups\Moderator;
use Identity\Domain\Models\Users\User;

class UserToGroupTranslator
{
	/**
	* Translates a user to a member
	*/
	public function toMember(User $user)
	{
	     return new Member($user->id, $user->email, $user->username);
	}

	/**
	* Translate a user to an Admin
	*/
	public function toAdmin(User $user)
	{
		return new Admin($user->id, $user->email, $user->username);
	}

	/**
	* Translate a user to a moderator
	*/
	public function toModerator(User $user)
	{
		return new Moderator($user->id, $user->email, 
			$user->username);
	}
}
