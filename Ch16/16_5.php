<?php

namespace App\Services\Users;

class SignupUserHandler
{
	public function handleSignup(SignupUserCommand $command)
	{
		//core application logic goes here 
		echo "User " . $command->username . " was signed up!";
	}
}

//somewhere in the code

use League\Container\Container;
use League\Tactician\Handler\Mapping\ClassName\Suffix;
use League\Tactician\Handler\Mapping\MapByNamingConvention;
use League\Tactician\Handler\Mapping\MethodName\
	HandleLastPartOfClassName;

//configure Tactician’s middleware to support the naming
//convention derived from the project’s Ubiquitous Language
$container = new Container();
$container->add(SignupUserCommand::class);

$handleMiddleware = new League\Tactician\Handler\
	CommandHandlerMiddleware(
		$container,
		new MapByNamingConvention(
			new Suffix(‘Handler’),
			new HandleLastPartOfClassName()
	)
);

$commandBus = new \League\Tactician\CommandBus 
	($handlerMiddleware);

//in a controller 
$command = new SignupUser();
$command->username = $request->username;
$command->password = $request->password;
$command->role = Role\Moderator::class;

$command->handle($command);
