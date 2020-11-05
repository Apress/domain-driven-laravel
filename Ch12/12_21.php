<?php

namespace Discussion\Domain\Models\Groups;
//use statements

class Group extends Model
{
	protected $fillable = [‘username’,’email’,’accountType’];

	public function admins()
	{
	     return $this->belongsToMany(User::class, ‘id’, ‘admin_of’);
	}
public function members()
	{
		return $this->belongsToMany(User::class, ‘id’, ‘member_of’);
	}

	public function moderators()
	{
		return $this->belongsToMany(User::class, ‘id’, 
 				‘moderator_of’);
	}	

	public function addMember(User $user)
	{
		$this->members->save($user);
	}

	public function addAdmin(User $user)
	{
		$this->admins->save($user);
	}

	public function addModerator(User $user)
	{
		$this->moderators->save($user);
	}

}
