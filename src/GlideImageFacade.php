<?php

namespace TinyPixel\WordPress\Glide;

use Illuminate\Support\Facades\Facade;

class GlideImageFacade extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor() : string
    {
        return 'glide-image';
    }
}
