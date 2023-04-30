<?php

namespace App\Providers;

use App\Models\PersonalInformation;
use App\Models\SocialMedia;
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
        View::composer(['layouts.admin', 'front.*'], function ($view){
            $data = PersonalInformation::first();
            $socialMedia = SocialMedia::all();
            $view->with('data', $data,)->with( 'socialMedia', $socialMedia);
        });
    }
}
