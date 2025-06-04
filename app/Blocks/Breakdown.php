<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class Breakdown extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Breakdown';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Used to breakdown key information';

    /**
     * The block category.
     *
     * @var string
     */
    public $category = 'reusable';

    /**
     * The block icon.
     *
     * @var string|array
     */
    public $icon = 'editor-ul';

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = [];

    /**
     * The block post type allow list.
     *
     * @var array
     */
    public $post_types = [];

    /**
     * The parent block type allow list.
     *
     * @var array
     */
    public $parent = [];

    /**
     * The ancestor block type allow list.
     *
     * @var array
     */
    public $ancestor = [];

    /**
     * The default block mode.
     *
     * @var string
     */
    public $mode = 'preview';

    /**
     * The default block alignment.
     *
     * @var string
     */
    public $align = '';

    /**
     * The default block text alignment.
     *
     * @var string
     */
    public $align_text = '';

    /**
     * The default block content alignment.
     *
     * @var string
     */
    public $align_content = '';

    /**
     * The supported block features.
     *
     * @var array
     */
    public $supports = [
        'align' => true,
        'align_text' => false,
        'align_content' => false,
        'full_height' => false,
        'anchor' => false,
        'mode' => false,
        'multiple' => true,
        'jsx' => false,
        'color' => [
            'background' => false,
            'text' => false,
            'gradient' => false,
        ],
    ];

    /**
     * The block styles.
     *
     * @var array
     */
    // public $styles = ['default', 'alternative'];

    /**
     * The block preview example data.
     *
     * @var array
     */


    /**
     * The block template.
     *
     * @var array
     */
    // public $template = [
    //     'core/heading' => ['placeholder' => 'Heading',],
    //     'core/paragraph' => [
    //         'placeholder' => 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum',
    //     ],
    //     'core/buttons' => ['placeholder' => 'Buttons', 'lock' => [
    //         'move'   => true,
    //         'remove' => true,
    //         'innerBlocks' => [
    //             [
    //                 'core/button' => ['placeholder' => 'Button', 'lock' => [
    //                     'move'   => true,
    //                     'remove' => true,
    //                 ]],
    //                 'core/button' => ['placeholder' => 'Button', 'lock' => [
    //                     'move'   => true,
    //                     'remove' => true,
    //                 ]],
    //             ],

    //         ],
    //     ]],


    // ];

    /**
     * Data to be passed to the block before rendering.
     */
    public function with(): array
    {
        return [
            'heading' => get_field('heading'),
            'content' => get_field('content'),
            'buttons' => get_field('buttons'),
            'breakdown' => get_field('breakdown'),
        ];
    }

    /**
     * The block field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('breakdown');

        $fields
            ->addText('heading')
            ->addWysiwyg('content', [
                'tabs' => 'visual',
                'toolbar' => 'simple',
                'media_upload' => 0,
            ])

            ->addRepeater('buttons', [
                'max' => 2,
                'layout' => 'block',
            ])
            ->addLink('link')
            ->endRepeater()

            ->addFlexibleContent('breakdown', [

                'layout' => 'block',
            ])
            ->addLayout('breakdown_item', [
                'label' => 'Item',

            ])
            ->addField('icon', 'svg_icon_picker', [
                'label'         => 'Icon',
                'return_format' => 'value', // or 'icon'
            ])
            ->addText('title')
            ->addWysiwyg('content', [
                'tabs' => 'visual',
                'toolbar' => 'simple',
                'media_upload' => 0,
            ])
            ->endFlexibleContent()
        ;




        return $fields->build();
    }


    /**
     * Assets enqueued when rendering the block.
     */
    public function assets(array $block): void
    {
        //
    }
}
