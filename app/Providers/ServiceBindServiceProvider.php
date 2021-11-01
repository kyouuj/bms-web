<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\LibraryService;
use App\Services\LibraryServiceImpl;


class ServiceBindServiceProvider extends ServiceProvider
{
    /**
     * All of the container bindings that should be registered.
     *
     * @var array
     */
    // public $bindings = [
    //     ServerProvider::class => DigitalOceanServerProvider::class,
    // ];

    /**
     * All of the container singletons that should be registered.
     *
     * @var array
     */
    // public $singletons = [
    //     DowntimeNotifier::class => PingdomDowntimeNotifier::class,
    //     ServerProvider::class => ServerToolsProvider::class,
    // ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(LibraryService::class, LibraryServiceImpl::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
