<?php

namespace App\Options;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Options as Field;

class AnalyticsOptions extends Field
{
    /**
     * The option page menu name.
     *
     * @var string
     */
    public $name = 'Analytics';

    /**
     * The option page menu slug.
     *
     * @var string
     */
    public $slug = 'analytics';

    /**
     * The option page document title.
     *
     * @var string
     */
    public $title = 'Analytics | Options';



    /**
     * The slug of another admin page to be used as a parent.
     *
     * @var string
     */
    public $parent = 'theme-options';


    /**
     * The option page field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('analytics_options');

        $fields->addText('google_analytics', ['instructions' => 'e.g. G-5PFNSMXX2A']);

        return $fields->build();
    }
}
