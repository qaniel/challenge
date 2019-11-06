<?php

namespace App\Providers;

use DG\Twitter\Twitter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Twitter::class, function () {
            return new Twitter(
                env('TWITTER_CONSUMER_KEY'),
                env('TWITTER__CONSUMER_SECRET_KEY'),
                env('TWITTER_ACCESS_KEY'),
                env('TWITTER_ACCESS_SECRET_KEY')
            );
        });
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
