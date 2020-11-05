<?php

use App\Registration\RegisterUser;

//... collect user attributes--most likely via a form request
$params = [`name` => `Jesse`, `username` => `debdubstep`];

$userRegister = new RegisterUser();
$userRegister->setName($params[`name`]);
$userRegister->setUsername($params[`username`]);
$user = $userRegister->registerUser();
//now we have an unsaved $user...
