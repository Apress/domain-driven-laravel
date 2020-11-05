<?php

$bookRepoType = “RedisBookRepository”; // this is derived from one of
							 // the methods listed above
$this->app->bind(‘Domain\Books\BookRepository’,
	‘Interface\Repository\RedisBookRepository’);
