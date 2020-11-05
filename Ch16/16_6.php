<?php 

//inside the AppServiceProvider’s boot() method: 
$this->app->bind(‘HashingMechanism’, function() {
	switch (config(‘hash.password’)) {
		case ‘md5’:
			return new Md5PasswordHash();
			break;
		case ‘bcrypt’:
			return new BcryptPasswordHash();
			break;
	}
});
