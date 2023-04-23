<?php

namespace App\Providers;

use App\Models\PersonalInformation;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(['layouts.admin'], function ($view){
            $data = PersonalInformation::first();
            $view->with('data', $data);
        });
    }
}
