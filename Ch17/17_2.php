<?php

namespace Illuminate\Foundation\Http;

use Exception;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Http\Kernel as KernelContract;
use Illuminate\Foundation\Http\Events\RequestHandled;
use Illuminate\Routing\Pipeline;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Facade;
use InvalidArgumentException;
use Symfony\Component\Debug\Exception\FatalThrowableError;
use Throwable;

class Kernel implements KernelContract
{
    /**
     * The application implementation.     *
     * @var \Illuminate\Contracts\Foundation\Application
     */
    protected $app;    

    /**
    * The router instance.
    *
    * @var \Illuminate\Routing\Router
    */
    protected $router;    
    
    /**
     * The bootstrap classes for the application.
     *
     * @var array
     */
    protected $bootstrappers = [/* … */]

    //See full code listing on Laravel’s website or API Docs
}