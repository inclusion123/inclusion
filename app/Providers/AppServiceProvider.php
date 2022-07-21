<?php

namespace App\Providers;

use App\Models\AboutUs;
use App\Models\Feature;
use App\Models\Service;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Setting;
use Illuminate\Support\Facades\View;
use App\Models\Team;

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

        //helper for share navbar details to views
        View::composer('*', function($view)
        {
            $navbars = Service::whereStatus(Service::ACTIVE)->orderBy('id')->get();
            $view->with('navbars', $navbars);
        });

        // helper for share setting details to views
        View::share('setting_helper', Setting::first());

     
    }
}
