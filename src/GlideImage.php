<?php

namespace TinyPixel\AcornGlide;

use function Roots\config;
use League\Glide\ServerFactory;
use League\Glide\Filesystem\FileNotFoundException;
use League\Glide\Filesystem\FilesystemException;

/**
 * Acorn Glide
 *
 * @author     Kelly Mears <kelly@tinypixel.dev>
 * @license    MIT
 * @version    1.0.0
 * @since      1.0.0
 *
 * @package    TinyPixel\AcornGlide
 * @subpackage GlideImage
 */
class GlideImage
{
    /**
     * Image source file.
     *
     * @var string The path to the input image.
     */
    protected $sourceFile;

    /**
     * Image modification parameters.
     *
     * @var array The modification the need to be made on the image.
     * @see http://glide.thephpleague.com/1.0/api/quick-reference/
     */
    protected $modificationParameters = [];

    /**
     * Glide
     *
     * @param string $file
     * @param array $modificationParameters
     *
     * @return string
     * @throws FileNotFoundException
     * @throws FilesystemException
     */
    public static function make(string $file, array $modificationParameters) : string
    {
        $config = config('glide');

        $glideServer = ServerFactory::create([
            'source'         => $config['source'],
            'cache'          => $config['cache'],
            'driver'         => $config['driver'],
            'presets'        => $config['presets'],
            'max_image_size' => $config['max_image_size'],
        ]);

        return $config['cache_url'] . $glideServer->makeImage($file, $modificationParameters);
    }
}
