<?php

namespace TinyPixel\AcornGlide;

use League\Glide\ServerFactory;
use League\Glide\Filesystem\FileNotFoundException;
use League\Glide\Filesystem\FilesystemException;

/**
 * Acorn Glide image response
 *
 * @author     Kelly Mears <kelly@tinypixel.dev>
 * @license    MIT
 * @version    1.0.0
 * @since      1.0.0
 *
 * @package    AcornGlide
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
     * Constructor
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = $config['glide'];
    }

    /**
     * Glide make
     *
     * @param string $file
     * @param array  $modificationParameters
     *
     * @return string
     * @throws FileNotFoundException
     * @throws FilesystemException
     */
    public static function make(string $file, array $modificationParameters) : string
    {
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
