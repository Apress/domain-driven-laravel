// ddl/src/Claim/Submission/Application/Providers/ClaimSubmissionProvider.php

<?php

namespace Claim\Submission\Application\Providers;

use Illuminate\Support\ServiceProvider;

class ClaimSubmissionProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *     
	* @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
		$this->loadMigrationsFrom(__DIR__ .
			'/../../Infrastructure/Database/migrations');
     //$this->loadTranslationsFrom(__DIR__.'/../resources/lang',
			'domain-driven-laravel');
     // $this->loadViewsFrom(__DIR__.'/../resources/views',
			 'domain-driven-laravel');
     //$this->loadMigrationsFrom(
			__DIR__.'/../database/migrations');
     // $this->loadRoutesFrom(__DIR__.'/routes.php');
    }
	
    public function register()
    {
	     $this->mergeConfigFrom(__DIR__.
			'/../config/claim_submission.php', 
			'domain-driven-laravel');
    }
}

