<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\LibraryService;
use App\Services\LibraryServiceImpl;
use App\Services\BookService;
use App\Services\BookServiceImpl;


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
    public $singletons = [
        // DowntimeNotifier::class => PingdomDowntimeNotifier::class,
        // ServerProvider::class => ServerToolsProvider::class,
        \App\Services\LibraryService::class => \App\Services\Impls\LibraryServiceImpl::class,
        \App\Services\BookService::class => \App\Services\Impls\BookServiceImpl::class,
        /* NEW BINDING */
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
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
