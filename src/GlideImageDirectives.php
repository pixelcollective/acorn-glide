<?php

use function \Roots\app;

return [

    /*
    |---------------------------------------------------------------------
    | @glide
    |---------------------------------------------------------------------
    */

    'glide' => function ($expression) {
        $values = collect(json_decode($expression, true));

        $parameters = $values->get('parameters');
        $file = $values->get('image');

        return app()['glide-image']::glide($file, $parameters);
    },
];
