<?php

namespace App\Blocks;

use Args\get_posts;
use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class OpportunitiesList extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Opportunities List';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Lists available opportunities';

    /**
     * The block category.
     *
     * @var string
     */
    public $category = 'widgets';

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
    public $keywords = ['job', 'vacancy', 'opportunity', 'volunteering', 'vacancies'];

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
    // public $styles = ['light', 'dark'];

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
    //     'core/heading' => ['placeholder' => 'Hello World'],
    //     'core/paragraph' => ['placeholder' => 'Welcome to the Opportunities List block.'],
    // ];

    /**
     * Data to be passed to the block before rendering.
     */
    public function with(): array
    {
        return [
            'title' => get_field('title'),
            'opportunities' => get_posts([
                'post_type' => 'opportunity',
                'posts_per_page' => get_field('number') ?: 3,
                'meta_query' => [
                    [
                        'key' => 'deadline',
                        'value' => date('Y-m-d H:i:s'),
                        'compare' => '>=',
                    ],

                ],
            ]),
            'no_opportunities_message' => get_field('no_opportunities_message'),
        ];
    }

    /**
     * The block field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('opportunities_list');

        $fields

            ->addText('title')
            ->addTextarea("no_opportunities_message")
            ->addNumber('number');


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
