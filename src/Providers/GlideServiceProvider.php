<?php

namespace TinyPixel\WordPress\Glide\Providers;

use \Request;
use \League\Glide\ServerFactory;
use \League\Glide\Responses\LaravelResponseFactory;
use \Roots\Acorn\ServiceProvider;
use function \Roots\config_path;
use \TinyPixel\WordPress\Glide\Glide;

class GlideServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(config_path('glide.php'), 'glide');

        $this->app->bind('glide', function () {
           return ServerFactory::create([
                'source' =>                  $this->app['config']->get('glide.source'),
                'cache' =>                   $this->app['config']->get('glide.cache'),
                'driver' =>                  $this->app['config']->get('glide.driver'),
                'defaults' =>                $this->app['config']->get('glide.default_image_manipulations'),
                'presets' =>                 $this->app['config']->get('glide.presets'),
                'base_url' =>                'https://tiny-pixel-project.valet/app/uploads/glide',
                'group_cache_in_folders' =>  $this->app['config']->get('glide.group_cache_in_folders'),
            ]);
        });
    }

    public function boot()
    {
    }
}