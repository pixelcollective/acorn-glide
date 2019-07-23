<?php

namespace TinyPixel\WordPress\Glide;

use League\Glide\ServerFactory;
use function Roots\config;

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

    public static function glide(string $file, $modificationParameters) : string
    {
        $config = config('glide');

        $modificationParameters = $modificationParameters;

        $sourceFileName = $file;

        $glideServerParameters = [
            'source' => $config['source'],
            'cache'  => $config['cache'],
            'driver' => $config['driver'],
        ];

        // dd($glideServerParameters);

        $glideServer = ServerFactory::create($glideServerParameters);

        return $config['cache_url'] . $glideServer->makeImage($sourceFileName, $modificationParameters);
    }
}
