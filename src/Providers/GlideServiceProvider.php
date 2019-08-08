<?php

namespace TinyPixel\AcornGlide\Providers;

use Roots\Acorn\ServiceProvider;
use TinyPixel\AcornGlide\GlideImage;
use TinyPixel\AcornGlide\Facades\Glide;

class GlideServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() : void
    {
        $this->glidePublishable = __DIR__ . '/../config/glide.php';
        $this->glideConfigPath  = $this->app->configPath('glide.php');

        if ($this->isBootable()) {
            $this->mergeConfigFrom($this->glideConfigPath, 'glide');

            $this->app->singleton('image', function ($app) {
                return new GlideImage($app['config']);
            });

            $this->app->singleton('image.alias', function ($app) {
                return $app->make('image');
            });
        }
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot() : void
    {
        $this->publishes([
            $this->glidePublishable => $this->glideConfigPath,
        ], 'glide');

        $this->app->make('image');
    }

    /**
     * Is bootable
     *
     * @return bool
     */
    public function isBootable() : bool
    {
        return file_exists($this->glideConfigPath);
    }
}
