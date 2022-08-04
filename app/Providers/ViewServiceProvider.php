<?php

namespace App\Providers;


use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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


        // single view bind
        View::composer(
            'client.sidebar', // view name
            'App\Libraries\ViewComposers\CategoryComposer' // composer class name
        );
        View::composer(
            '*', // view name
            'App\Libraries\ViewComposers\CartAuthComposer' // composer class name
        );

        // multiple view bind
        // View::composer(
        //     [
        //         'home',
        //         'about-us',
        //         //... more if you want
        //     ],
        //     'App\Libraries\ViewComposers\CategoryComposer' // class name
        // );
    }
}
