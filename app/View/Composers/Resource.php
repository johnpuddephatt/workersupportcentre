<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Resource extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.content-single-resource',
    ];

    public function with()
    {
        global $post;

        return [
            "file_uploads" => get_field('files', $post->ID),
            "file_oembeds" =>  get_field('embeds', $post->ID),
            "external_links" => get_field('links', $post->ID),

        ];
    }
}
