<?php

namespace App\Common\Domain\Events;

abstract class DomainEvent
{
/** The model which the event corresponds to */
	public Model $entity;
	
	/** The user that initiated the event */
	public User $user;

	/**
	* Returns the result of string replace of ‘_’ to ‘.’.
	* @return string
	*/
	public function getName(): string
	{
		return str_replace(‘_’, ‘.’, snake_case((new
			 \ReflectionClass($this))->getShortName();
	}
}
