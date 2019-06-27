<?php

namespace L_forum\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use L_forum\Channel;
use L_forum\Reply;


class AppServiceProvider extends ServiceProvider
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
        Schema::defaultStringLength(191);
        View::share('channels',Channel::all());
        view::share('replies',Reply::all());
    }
}
