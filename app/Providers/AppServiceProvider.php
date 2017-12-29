<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $currentUser = auth()->user();
        View::share($currentUser);
        Schema::defaultStringLength(191);
//        View->with(compact('currentUser'));
        app()->setLocale('ko');
        \Carbon\Carbon::setLocale(app()->getLocale());
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
