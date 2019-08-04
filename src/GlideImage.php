<?php

namespace TinyPixel\Acorn\Glide;

use function Roots\config;
use League\Glide\ServerFactory;

class GlideImage
{
    /**
     * @var string The path to the input image.
     */
    protected $sourceFile;

    /**
     * @var array The modification the need to be made on the image.
     *            Take a look at Glide's image API to see which parameters are possible.
     *            http://glide.thephpleague.com/1.0/api/quick-reference/
     */
    protected $modificationParameters = [];

    /**
     * Glide
     *
     * @param  string $file
     * @param  array  $modificationParamters
     * @return string
     */
    public static function make(string $file, array $modificationParameters) : string
    {
        $config = config('glide');

        $glideServer = ServerFactory::create([
            'source' => $config['source'],
            'cache'  => $config['cache'],
            'driver' => $config['driver'],
            'max_image_size' => $config['max_image_size'],
            'presets' => $config['presets'],
        ]);

        return $config['cache_url'] . $glideServer->makeImage($file, $modificationParameters);
    }
}
