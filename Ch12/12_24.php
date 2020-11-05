<?php

use Discussion\Domain\Services\Groups\UserToGroupTranslator;

class Group extends Model
{
	protected $fillable = [‘username’,’email’,’accountType’];

	public function __constrcut(GroupId $groupId, Name $name, Slug 
					$slug)
	{
		$this->setId($groupId);
		$this->setName($name);
		$this->setSlug($slug);

		$this->admins = new Collection();
		$this->members = new Collection();

		$this->usersToGroupTranslator = new UserToGroupTranslator();
	}

	public function users()
	{
		return $this->hasMany(Users::class);
	}
	
	public function getMembersAttribute()
	{
		return $this->members->map(function($user) {
			return $this->userInGroupTranslator->toMember($user);
		});
	}

	public function getAdminsAttribute()
	{	
		return $this->admins->map(function($user) {
			return $this->userInGroupTranslator->toAdmin($user);
		});
	}

	public function getModeratorsAttribute()
	{
		return $this->moderators->map(function($user) {
			return $this->userInGroupTranslator->
				toModerator($user);
		}
	}
	// ... other related methods for the Group model ... 
}
