<?php

namespace TinyPixel\WordPress\Glide;

// Illuminate framework
use \Illuminate\Support\Collection;

// Roots
use \Roots\Acorn\Application;

/**
 * WordPress Glide
 *
 * @author  Kelly Mears <kelly@tinypixel.dev>
 * @license MIT
 * @since   1.0.0
 */
class Glide
{
    /**
     * Constructor
     *
     * @param  \Roots\Acorn\Application $app
     * @return object $this
     */
    public function __construct(Application $app)
    {
        $this->app = $app;

        return $this;
    }

    public function glide($image)
    {
        $this->app->make('glide')::create([
            'source' =>                  $this->app['config']->get('glide.source'),
            'cache' =>                   $this->app['config']->get('glide.cache'),
            'driver' =>                  $this->app['config']->get('glide.driver'),
            'max_image_size' =>          $this->app['config']->get('glide.image_size_limit'),
            'defaults' =>                $this->app['config']->get('glide.default_image_manipulations'),
            'presets' =>                 $this->app['config']->get('glide.presets'),
            'group_cache_in_folders' =>  $this->app['config']->get('glide.group_cache_in_folders'),
        ]);

        return $glideServer->outputImage($image, $_GET);
    }
}
