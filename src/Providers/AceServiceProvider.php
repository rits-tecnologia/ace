<?php

namespace Rits\Ace\Providers;

use Illuminate\Support\ServiceProvider;
use Rits\Ace\Support\Breadcrumbs\Breadcrumbs;

class AceServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bootPackage();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('breadcrumbs', function () {
            return (new Breadcrumbs)->setAttribute('class', 'breadcrumb');
        });
    }

    /**
     * Boot package vendor files.
     *
     * @return void
     */
    protected function bootPackage()
    {
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'ace');
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'ace');

        $this->publishes([
            __DIR__ . '/../../resources/assets' => resource_path('assets/vendor/ace'),
        ], 'ace-assets');

        $this->publishes([
            __DIR__ . '/../../resources/views' => resource_path('views/vendor/ace'),
        ], 'ace-views');

        $this->publishes([
            __DIR__ . '/../../stub/config/ace.php' => config_path('ace.php'),
        ], 'ace-config');
    }
}
