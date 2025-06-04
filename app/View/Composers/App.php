<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class App extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        '*',
    ];

    public function with()
    {
        return [
            'og' => [
                'description' => get_the_excerpt() ?: get_bloginfo('description'),
                'image' => get_the_post_thumbnail_url(get_the_ID(), 'large') ?: (wp_get_attachment_image_src(get_field('social_media_image', 'options'), 'large')[0] ?? null),
            ],
            'analytics' => get_field('google_analytics', 'options')
        ];
    }

    /**
     * Retrieve the site name.
     */
    public function siteName(): string
    {
        return get_bloginfo('name', 'display');
    }
}
