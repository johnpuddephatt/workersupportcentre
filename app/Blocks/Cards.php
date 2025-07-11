<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class Cards extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Cards';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Used to add a block of link cards to a page';

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
    public $icon = 'grid-view';

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = ['links', 'boxes', 'cards'];

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
        'mode' => true,
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
    public $styles = ['default', 'compact'];

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
            'cards' => get_field('cards'),
        ];
    }

    /**
     * The block field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('card');

        $fields
            ->addFlexibleContent('cards')
            ->addLayout('manual_link')
            ->addSelect('colour', [
                'choices' =>
                [
                    'bg-beige' => 'Beige',
                    'bg-lime' => 'Lime',
                    'bg-teal' => 'Teal',
                    'bg-mint' => 'Mint',
                ],
                'label' => 'Colour',
                'default_value' => 'bg-beige',
            ])->addText('title')
            ->addTextarea('content')
            ->addUrl('link')
            ->addLayout('page_or_post')
            ->addSelect('colour', [
                'choices' =>
                [
                    'bg-beige' => 'Beige',
                    'bg-lime' => 'Lime',
                    'bg-teal' => 'Teal',
                    'bg-mint' => 'Mint',
                ],
                'label' => 'Colour',
                'default_value' => 'bg-beige',
            ])
            ->addPostObject('page', [
                'post_type' => ['page', 'post'],
                'return_format' => 'id',
            ])

            ->addTrueFalse('override_details')
            ->addText(
                'title',
                [
                    'conditional_logic' => [
                        [
                            [
                                'field' => 'override_details',
                                'operator' => '==',
                                'value' => '1',
                            ],
                        ],
                    ],
                ]
            )

            ->addTextarea(
                'content',
                [
                    'conditional_logic' => [
                        [
                            [
                                'field' => 'override_details',
                                'operator' => '==',
                                'value' => '1',
                            ],
                        ],
                    ],
                ]
            )

            ->addText(
                'read_more',
                [
                    'conditional_logic' => [
                        [
                            [
                                'field' => 'override_details',
                                'operator' => '==',
                                'value' => '1',
                            ],
                        ],
                    ],
                ]
            )


            ->endFlexibleContent();



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
