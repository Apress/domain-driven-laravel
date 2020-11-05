<?php

//use statements & namespace
class HomeController extends BaseController {
    /**
     * @var App\Adapters\CommandBus\CommandBus
     */
    private $bus;

    public function __construct(CommandBus $bus)
    {
        $this->bus = $bus;
    }
    public function createTicket()
    {
        $command = new CreateTicketCommand( Input::all() );

        try {
            $this->bus->execute($command);
        } catch(ValidationException $e) {
            return Redirect::to('/tickets/new')->withErrors(
			$e->getErrors() );
        } catch(\DomainException $e) {
            return Redirect::to('/tickets/new')->withErrors(
			$e->getErrors() );
	}
	return Redirect::to('/tickets')->with(['message' => 
		'success!']);
    }
}
