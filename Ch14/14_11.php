<?php

// in UserRepository

public function getPublishedMales(\DateTimeImmutable $isAtLeastAge)
							: QueryBuilder 
{
	$users = User::with(‘address’)
			->isActive()
			->isMale()
			->isAtLeastAge($age)
			->hasPublished();
}
