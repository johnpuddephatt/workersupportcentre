<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

class Person extends Field
{
    /**
     * The field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('role', [
            'position' => 'side',
        ]);

        $fields
            ->setLocation('post_type', '==', 'person');

        $fields
            ->addText('role_title');


        return $fields->build();
    }
}
