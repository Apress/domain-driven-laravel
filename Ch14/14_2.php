<?php

//somewhere in an infrastructure or domain service class definition

protected $argument;

public function __construct(string $argument)
{
	$this->argument = $argument;
}

protected function doSomeStuff()
{
	$argument = $this->argument;
$results = DB::select(
		DB::raw(
			"SELECT * FROM some_table WHERE some_col = :argument"
		),[ 'argument' => $argument])
	);
}
