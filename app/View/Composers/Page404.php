<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Page404 extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        '404',
    ];
    /**
     * Data to be passed to the view.
     *
     * @return array
     */
    public function with()
    {
        return [
            'page' => get_post(get_option('page_for_404')),
        ];
    }
}
