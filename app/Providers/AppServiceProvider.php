<?php

namespace App\Providers;

use App\Models\ServiceCategory;
use App\Observers\CategoryObserver;
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
        session(['lang' => 'en']);
       
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        ServiceCategory::observe(CategoryObserver::class);

    }
}
