<?php

namespace App\Common\Domain\Events;

use App\Common\Jobs\SaveDomainEvent;
use App\Jobs\Job;
use App\Common\Traits\Saveable;
use App\Common\Infrastructure\Repositories\DomainEventRepository;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;

class SaveDomainEvent extends Job implements ShouldQueue
{
	use InteractsWithQueue, Saveable;

	private DomainEvent $event;

	private Model $entity;

	public function __construct(DomainEvent $event)
	{
		$this->event = $event;

		if (property_exists($event, ‘entity’)) {
			$this->entity = $this->event->entity;
		}
	}

	public function handle(DomainEventRepository $eventRepository)
	{
		return $eventRepository->createFromData([
			'event_id' => Uuid::uuid4()->toString(),
			'event_body' => json_encode(array_filter(array_except(
				get_object_vars($this->event),['entity'])
			)),
			'eventable_type' => $this->entity ? 
				get_class($this->entity) : null,
			'eventable_id' => $this->entity ? 
				$this->entity->getKey() : null,
			'event_type' => $this->event->getName(),
			'user_id' => $this->event->user ?
				$this->event->user->getKey() : null
		]);
	}
}
