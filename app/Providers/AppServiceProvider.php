<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Policies\BookPolicy;
use App\Book;

class AppServiceProvider extends ServiceProvider
{
    protected $policies = [
        'App\Book' => 'App\Policies\BookPolicy',
    ];
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
        //
    }
}
