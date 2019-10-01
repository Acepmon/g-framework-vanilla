<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CarwebServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('themes.car-web.includes.header', function ($view) {
            $mainMenus = \App\Menu::where('title', 'Car Main')->first()->children;
            $topbarMenus = \App\Menu::where('title', 'Car Topbar')->first()->children;
            $dropdownMenus = \App\Menu::where('title', 'Car Profile Dropdown')->first()->children;
            return $view->with('mainMenus', $mainMenus)->with('topbarMenus', $topbarMenus)->with('dropdownMenus', $dropdownMenus);
        });

        view()->composer('themes.car-web.includes.footer', function ($view) {
            $mainMenus = \App\Menu::where('title', 'Car Main')->first()->children;
            $footerMenus = \App\Menu::where('title', 'Car Footer')->first()->children;
            return $view->with('footerMenus', $footerMenus)->with('mainMenus', $mainMenus);
        });
    }
}
