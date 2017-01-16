<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Facebook\Container;

class ContaienerServiceProvider extends ServiceProvider
{
    protected $defer = true;
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Container::class, function () {
            return new Container();
        });
    }
    
    public function provides()
    {
        return [Container::class];
    }
    
}
