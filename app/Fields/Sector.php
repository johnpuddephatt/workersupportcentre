<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

class Sector extends Field
{
    /**
     * The field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('faqs', [
            'position' => 'normal',
        ]);

        $fields
            ->setLocation('post_type', '==', 'foo');

        $fields
            ->addText('role_title');


        return $fields->build();
    }
}
