<?php namespace stjo\Providers;

use Illuminate\Support\ServiceProvider;

class SigkatDataProvider extends ServiceProvider {

    /**
     * This Class will suply data to the requesting Addons
     */
    public function boot(){
        //composing views
        view()->composer(
            '*', '\stjo\Http\Composers\NavbarComposer'
        );

        view()->composer(
            'home',
            '\stjo\Http\Composers\HighlightsComposer'
        );

        view()->composer(
            'addons.publicSidebar',
            '\stjo\Http\Composers\publicSidebarComposer'
        );

        view()->composer(
            'addons.adminSidebar',
            '\stjo\Http\Composers\adminSidebarComposer'
        );
    }

    public function register(){
        //
    }
}