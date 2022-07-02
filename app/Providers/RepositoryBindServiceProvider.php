<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryBindServiceProvider extends ServiceProvider
{
    /**
     * All of the container singletons that should be registered.
     *
     * @var array
     */
    public $singletons = [
        \App\Repositories\BookRepository::class => \App\Repositories\Impls\BookRepositoryImpl::class,
        \App\Repositories\UserRepository::class => \App\Repositories\Impls\UserRepositoryImpl::class,
        \App\Repositories\UserBookRepository::class => \App\Repositories\Impls\UserBookRepositoryImpl::class,
        \App\Repositories\LibraryBookRepository::class => \App\Repositories\Impls\LibraryBookRepositoryImpl::class,
        /* NEW BINDING */
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
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
