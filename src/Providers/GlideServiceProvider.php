<?php

namespace TinyPixel\Acorn\Glide\Providers;

use function Roots\config_path;
use Roots\Acorn\ServiceProvider;
use TinyPixel\Acorn\Glide\GlideImage;
use TinyPixel\Acorn\Glide\Facades\Glide;

class GlideServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/glide.php', 'glide');

        $this->app->singleton('image', GlideImage::class);

        $this->app->singleton(Glide::class, function () {
            return $this->app->make('image');
        });
    }

    /**
     * Bootstrap the application events.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/glide.php' => config_path('glide.php'),
        ], 'glide');

        $this->app->make('image');
    }
}
