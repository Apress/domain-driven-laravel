<?php  

namespace App\Events; 

use Illuminate\Events\Dispatcher as DispatcherInterface;

class Dispatcher implements DispatcherInterface {

    /**
     * @var \Illuminate\Events\DispatcherInterface
     */
    private $dispatcher;
    public function __construct(LaravelDispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function dispatch(Array $events)
    {
        foreach($events as $event)
        {
            $this->dispatcher->fire($event->name(), [$event]);
        }
    }
}

?>
<?php
namespace App\Events; 

interface EventInterface {
    /**
     * Return the event name
     * @return string=
     */
    public function name();
} 

trait Eventable {
    protected $queuedEvents;
    public function flushEvents()
    {
        $events = $this->queuedEvents;
        $this->queuedEvents = [];

        return $events;
    }
    public function raise($event)
    {
        $this->queuedEvents[] = $event;
    }
}
?>