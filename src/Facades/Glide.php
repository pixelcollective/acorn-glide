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
 * @copyright  Tiny Pixel Collective <tinypixel.dev>
 * @package    AcornGlide
 * @subpackage Facades
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
