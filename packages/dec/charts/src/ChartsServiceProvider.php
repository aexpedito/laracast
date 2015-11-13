<?php

namespace Dec\Charts;

use Illuminate\Support\ServiceProvider;

class ChartsServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {

        $this->loadViewsFrom(__DIR__ . '/views', 'charts');
        $this->publishes([__DIR__ . '/views' => base_path('resources/views/dec/charts'),]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        include __DIR__ . '/routes.php';
        $this->app->make('Dec\Charts\ChartsController');
    }

//    public function on_start(){
//        require $this->getPackagePath() . '/vendor/autoload.php';
//    }
}
