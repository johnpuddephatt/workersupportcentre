<?php

namespace App\Options;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Options as Field;

class PrivacyOptions extends Field
{
    /**
     * The option page menu name.
     *
     * @var string
     */
    public $name = 'Privacy';

    /**
     * The option page menu slug.
     *
     * @var string
     */
    public $slug = 'privacy';

    /**
     * The option page document title.
     *
     * @var string
     */
    public $title = 'Privacy | Options';



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
        $fields = Builder::make('privacy_options');

        $fields->addText('privacy_banner', [
            'instructions' => 'This will appear on the cookie consent banner',
            'default' => 'With your consent, this site will use cookies to analyse site usage and improve your experience. '
        ]);

        return $fields->build();
    }
}
