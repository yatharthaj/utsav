<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class NavigationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->BackendNavBar();
        $this->partnerLogos();
        $this->mainMenu();
        $this->footerMenu();
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    private function BackendNavBar(){
        view()->composer('backend.partials._nav','App\Http\Composers\BackendComposer@navBar');
    }

    private function partnerLogos(){
        view()->composer('frontend.partials._nav','App\Http\Composers\FrontendComposer@partners');
    }    

    private function mainMenu(){
        view()->composer('frontend.partials._nav','App\Http\Composers\FrontendComposer@menus');
        view()->composer('frontend.partials._nav','App\Http\Composers\FrontendComposer@trekRegions');
        view()->composer('frontend.partials._nav','App\Http\Composers\FrontendComposer@climbRegions');
        view()->composer('frontend.partials._nav','App\Http\Composers\FrontendComposer@skis');
        view()->composer('frontend.partials._nav','App\Http\Composers\FrontendComposer@heliSki');
        view()->composer('frontend.partials._nav','App\Http\Composers\FrontendComposer@tours');
    }     
    private function footerMenu(){
        view()->composer('frontend.partials._footer','App\Http\Composers\FrontendComposer@countries');        
        view()->composer('frontend.partials._footer','App\Http\Composers\FrontendComposer@pages');     
        view()->composer('frontend.partials._footer','App\Http\Composers\FrontendComposer@activity');     
        view()->composer('frontend.partials._footer','App\Http\Composers\FrontendComposer@contact');               
    }    
}
