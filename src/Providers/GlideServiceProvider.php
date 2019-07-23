<?php

namespace TinyPixel\WordPress\Glide\Providers;

use \TinyPixel\WordPress\Glide\GlideImage;

use \Roots\Acorn\ServiceProvider;
use function \Roots\config_path;
use \Blade;

class GlideServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/glide.php' => $this->app->configPath() . '/' . 'glide.php',
        ], 'config');

        $glide = $this->app->make('glide-image');

        collect($this->directives)->each(function ($item, $key) {
           $this->app['blade.compiler']->directive($key, $item);
        });

    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/glide.php', 'glide');

        $this->app->singleton('glide-image', function () {
            return new GlideImage();
        });

        $this->directives = require __DIR__ .'/../GlideImageDirectives.php';
    }
}
