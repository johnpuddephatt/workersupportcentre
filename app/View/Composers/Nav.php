<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use Log1x\Navi\Navi;

class Nav extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'sections.header',
        'sections.footer',
    ];

    public function with()
    {
        return [
            'primary_navigation' => $this->primaryNavigation(),
            'secondary_navigation' => $this->secondaryNavigation(),
            'footer_navigation' => $this->footerNavigation(),
        ];
    }

    /**
     * Get the primary navigation.
     *
     * @return array
     */
    public function primaryNavigation(): array
    {
        $navigation = (new Navi())->build('primary_navigation');

        if ($navigation->isEmpty()) {
            return [];
        }

        return $navigation->toArray();
    }

    public function secondaryNavigation(): array
    {
        $navigation = (new Navi())->build('secondary_navigation');

        if ($navigation->isEmpty()) {
            return [];
        }

        return $navigation->toArray();
    }

    public function footerNavigation(): array
    {
        $navigation = (new Navi())->build('footer_navigation');

        if ($navigation->isEmpty()) {
            return [];
        }

        return $navigation->toArray();
    }
}
