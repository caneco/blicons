<?php

namespace Caneco\Blicons;

use Caneco\Blicons\Commands\CacheIconsCommand;
use Caneco\Blicons\Components\Icon;
use Caneco\Blicons\Components\IconList;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class BliconsServiceProvider extends ServiceProvider
{
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([__DIR__.'/../resources/icons' => base_path('resources/icons')], 'blicons');
            $this->commands([CacheIconsCommand::class]);
        }
    }

    public function boot()
    {
        $this->bootResources();
    }

    private function bootResources()
    {
        $this->loadViewsFrom(__DIR__ .'/../resources/views', 'blicons');

        $this->loadViewComponentsAs('', [
            Icon::class,
            IconList::class,
        ]);

        View::share('_BLICONS_LIST_', collect([]));
    }
}
