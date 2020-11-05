<?php

namespace YarnsAndGobyl\Infrastructure\Repositories;

use YarnsAndGobyl\Domain\Repositories\CartRepository;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

class EloquentCartRepository implements CartRepository
{
	public function nextIdentity()
	{
		try {
			$uuid = Uuid::uuid4();
			return $uuid->toString();
		} catch (UnsatisfiedDependencyException $e) {
			dd(“Exception Occurred : ” . $e->getMessage());
		}
	}
	
	public function add(Cart $cart)
	{
		//implement add functionality ...
	}

	public function remove(Cart $cart)
	{
		//implement remove functionality ...
	}
}	
