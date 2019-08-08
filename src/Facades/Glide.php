<?php

namespace TinyPixel\AcornGlide\Facades;

use Roots\Acorn\Facade;

/**
 * `Image` Facade
 *
 * @author     Kelly Mears <kelly@tinypixel.dev>
 * @license    MIT
 * @version    1.0.0
 * @since      1.0.0
 *
 * @package    AcornGlide
 */
class Glide extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() : string
    {
        return 'image.alias';
    }
}
