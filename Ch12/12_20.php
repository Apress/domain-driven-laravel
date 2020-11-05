<?php

namespace Identity\Domain\Models\Users;

use Discussion\Domain\Models\Groups\Group;

class User extends Model
{
	protected $fillable = [‘email’,’username’];

	public function adminOf()
	{
		return $this->belongsToMany(Groups::class,‘admins_groups’);
	}

	public function memberOf()
	{
		return $this->belongsToMany(Group::class,’members_groups’);
	}

	public function moderatorOf()
	{
		return $this->belongsToMany(Group::class, 
			’moderators_group’);
	}

	public function addAsMemberOf(Group $group)
	{
		$this->memberOf[] = $group;
		$group->addMember($this);
	}

	public function addAsAdminOf(Group $group)
	{
		$this->adminOf[] = $group;
		$group->addAdmin($this);
	}

	public function addAdModeratorOf(Group $group)
	{
		$this->moderatorOf[] = $group;
		$group->addModerator($this);
	}
}
?>
