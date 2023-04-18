<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['layouts.front.index',
            'front.category',
            'front.category-kecamatan',
            'front.label',
            'front.search',
            'front.page',
            'front.contact',
            'layouts.front.bottom-sidebar',
            'front.include.widget-social'
            ], 'App\Http\ViewComposers\SettingComposer');
        view()->composer(['layouts.front.header','layouts.front.bottom-sidebar'], 'App\Http\ViewComposers\MenuComposer');
        view()->composer('layouts.front.header', 'App\Http\ViewComposers\BreakingComposer');
        view()->composer('front.index', 'App\Http\ViewComposers\SetHomeComposer');
        view()->composer('front.show', 'App\Http\ViewComposers\SetSingleComposer');
        view()->composer('layouts.front.bottom-sidebar', 'App\Http\ViewComposers\CategoryFooterComposer');
        view()->composer('*', 'App\Http\ViewComposers\CarbonComposer');
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
