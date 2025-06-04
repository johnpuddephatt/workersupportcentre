<?php

return [
    'logo' => [
        'src' => 'public/logo.svg',
        'width' => 200,
        'height' => 100,
    ],

    'image_sizes' => [
        'thumbnail' => [150, 150, true],
        'medium' => [300, 300, false],
        'large' => [1024, 1024, false],

        'landscape' => [300, 200, true],
        'landscape-lg' => [600, 400, true],
        'landscape-xl' => [900, 600, true],
        'landscape-2xl' => [1200, 800, true],
        'landscape-3xl' => [1500, 1000, true, true],

        'square' => [300, 300, true],
        'square-lg' => [600, 600, true],
        'square-xl' => [900, 900, true],
        'square-2xl' => [1200, 1200, true, true],
    ],

    'options_pages' => [
        // 'page_for_events' => 'Events Page',
        // 'page_for_applications' => 'Applications Page',
        'page_for_opportunities' => 'Opportunities Page',
        'page_for_resources' => 'Resources Page',
        'page_for_404' => '404 Page',
    ],
];
