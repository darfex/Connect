<?php

namespace App\Providers;

use App\Models\Publication;
use App\Observers\PublicationObserver;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Publication::observe(PublicationObserver::class);
        // Post::observe(PostObser)
    }
}
