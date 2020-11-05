<?php  

namespace Hex\Tickets\Events;

use App\Models\Ticket;
use App\Events\EventInterface;

class TicketCreatedEvent implements EventInterface {
    /**
     * @var \Hex\Tickets\Ticket
     */
    private $ticket;
    
    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }

    /**
     * Return the event name
     * @return string
     */
    public function name()
    {
        return 'ticket.created';
    }
}
