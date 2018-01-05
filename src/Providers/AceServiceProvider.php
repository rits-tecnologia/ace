<?php

namespace Rits\Ace\Providers;

use Creitive\Breadcrumbs\BreadcrumbsServiceProvider;
use Illuminate\Support\ServiceProvider;

class AceServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
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

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(BreadcrumbsServiceProvider::class);
    }
}
