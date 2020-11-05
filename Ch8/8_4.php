<?php
namespace App\Providers;
class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';
    protected $submission_namespace = 'Claim\Submission\Application\Http\Controllers';
    protected $submission_dir = ‘src/Claim/Submission/Application/Routes/’;

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
	  $this->mapApiRoutes();
	  $this->mapWebRoutes();
    }
    /**
	* Define the "web" routes for the application.
	*
	* These routes all receive session state, CSRF protection, etc.
	*
	* @return void
	*/
	protected function mapWebRoutes()
	{
        Route::middleware('web')
           ->namespace($this->namespace)
           ->group(base_path('routes/web.php'));

        Route::middleware('web')
           ->namespace($this->submission_namespace)
           ->prefix('submission')     
		->group(base_path($this->submission_dir . 'web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless
     *
     * @return void	
     */
    protected function mapApiRoutes()
   {
      Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
		  ->group(base_path('routes/api.php'));
      Route::prefix('submission/api')
		  ->middleware('api')
		  ->namespace($this->submission_namespace . '/Api')
		  ->group(base_path($this->submission_dir . ‘api.php’));
    }
}

