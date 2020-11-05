<?php

namespace App\Common\Domain\Traits;

use App\Common\Jobs\SaveDomainEvent;
use App\Common\Domain\Events\DomainEvent;

trait Saveable
{
	public function save()
	{
		dispatch(new SaveDomainEvent(DomainEvent $this));
	}
}
