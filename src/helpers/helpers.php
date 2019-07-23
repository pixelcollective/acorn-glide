<?php

namespace App;

use function Roots\app;

function glide($image)
{
    return app()->make('glide.wordpress')->glide($image);
}