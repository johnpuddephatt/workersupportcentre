<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

class Resource extends Field
{
    /**
     * The field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('resource', [
            // 'position' => 'side',
        ]);

        $fields
            ->setLocation('post_type', '==', 'resource');

        $fields
            ->addWysiwyg('content', [])


            ->addRepeater('embeds', [
                'layout' => 'block',
            ])
            ->addOembed('embed', [
                'label' => 'Embed',
                'instructions' => 'Paste the URL of a video or other resource',
                'required' => 1,
            ])
            ->endRepeater('embeds')


            ->addRepeater('files', [
                'layout' => 'block',
            ])
            ->addText('title', [
                'label' => 'Title',
                'instructions' => 'Enter the title of the resource',
                'required' => 1,
            ])
            ->addText('subtitle', [
                'label' => 'Subtitle',
                'instructions' => 'Enter addtional information about the resource, such as the author',
                'required' => 0,
            ])
            ->addFile('file', [
                'label' => 'File',
                'instructions' => 'Enter the title of the resource',
                'required' => 1,
            ])
            ->endRepeater('files')

            ->addRepeater('links', [
                'layout' => 'block',
            ])
            ->addText('title', [
                'label' => 'Title',
                'instructions' => 'Enter the title of the link',
                'required' => 1,
            ])
            ->addText('subtitle', [
                'label' => 'Subtitle',
                'instructions' => 'Enter addtional information about the link, such as the author',
                'required' => 0,
            ])
            ->addUrl('url', [
                'label' => 'URL',
                'instructions' => 'Enter the URL of the link',
                'required' => 1,
            ])
            ->endRepeater('links')


        ;

        return $fields->build();
    }
}
