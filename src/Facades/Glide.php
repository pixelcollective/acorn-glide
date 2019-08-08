<?php

namespace TinyPixel\AcornGlide\Facades;

use Roots\Acorn\Facade;

class Glide extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor() : string
    {
        return 'image.alias';
    }
}
