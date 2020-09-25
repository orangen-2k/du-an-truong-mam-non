<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Repositories\Auth\AuthRepository;
use App\Repositories\Auth\AuthRepositoryInterface;
use Illuminate\Support\Facades\View;
use App\Models\NamHoc;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Repositories\BaseRepository::class,
            \App\Repositories\RepositoryInterface::class
        );

        $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['nam-hoc.index', 'index'], function ($view) {
            View::share('data', NamHoc::all());
            // return ['data'=>NamHoc::all()];
        });
        Schema::defaultStringLength(191);
    }
}