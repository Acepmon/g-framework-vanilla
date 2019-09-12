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
            $mainMenus = \App\Menu::where('parent_id', 43)->get();
            $topbarMenus = \App\Menu::where('parent_id', 49)->get();
            return $view->with('mainMenus', $mainMenus)->with('topbarMenus', $topbarMenus);
        });

        view()->composer('themes.car-web.includes.footer', function ($view) {
            $mainMenus = \App\Menu::where('parent_id', 43)->get();
            $footerMenus = \App\Menu::where('parent_id', 53)->get();
            return $view->with('footerMenus', $footerMenus)->with('mainMenus', $mainMenus);
        });
    }
}
