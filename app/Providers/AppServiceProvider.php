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
        //
        view()->composer('layouts.website', function($view)
        {
            $view->with('products', \App\Admin\Products\Product::orderBy('id')->get());
            $view->with('site_content', \App\Admin\SiteContent\Sitecontent::where('lang' , 'en')
                ->pluck('content', 'code'));  
        });

        view()->composer('layouts.arabic', function($view)
        {
            \App::setLocale('ar');
            $view->with('products', \App\Admin\Products\Product::orderBy('id')->get());

            $view->with('site_content', \App\Admin\SiteContent\Sitecontent::pluck('content', 'code'));  
        });

        view()->composer('layouts.new', function($view)
        {
            $view->with('products', \App\Admin\Products\Product::orderBy('id')->get());
            if( app()->getLocale() == 'ar' ) {
                $view->with('site_content', \App\Admin\SiteContent\Sitecontent::pluck('content', 'code'));  
            } else {
                $view->with('site_content', \App\Admin\SiteContent\Sitecontent::where('lang' , 'en')->pluck('content', 'code'));  
            } 
        });
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
