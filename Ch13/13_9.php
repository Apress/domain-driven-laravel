<?php

namespace Claim\Submission\Domain\Events;

use App\Events\Event;
use App\Common\Domain\Events\SaveDomainEvent;
use App\Common\Domain\Traits\Saveable;
use Claim\Submission\Domain\Models\Claim;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ClaimWasSubmitted extends DomainEvent implements ShouldBroadcast
{
    use SerializesModels, Saveable;

    public Claim $claim;

    public User $user;

    /**
     * Create Event
     */
    public function __construct(Claim $claim): void
    {
        $this->claim = $claim;
        $this->user = $user;
        $this->entity = $claim;
    }

    /**
     * Broadcast on channel ‘domain_events’
     */
    public function broadcastOn()
    {
        return [‘domain_events’];
    }
}
