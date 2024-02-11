<?php

namespace App\Providers;


use App\Models\GeneralSettings;
use Illuminate\Pagination\Paginator;
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
        $generalSettings = GeneralSettings::first();
        $settingsData = [
            'favicon' => $generalSettings ? $generalSettings->favicon : null,
            'header_logo' => $generalSettings ? $generalSettings->header_logo : null,
            'footer_logo' => $generalSettings ? $generalSettings->footer_logo : null,
        ];

        View::composer('*', function ($view) use ($settingsData) {
            $view->with('settingsData', $settingsData);
        });
    }
}
