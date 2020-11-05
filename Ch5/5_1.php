// An example service provider 

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Predis\Client;

class RedisServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
	     $this->app->singleton(Redis::class, function ($app) {
			return new Client(
				config('database.redis.options.default'));
          });
    }
}


