<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class PeopleList extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'People List';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Display lists of people';

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
    public $keywords = ['people', 'staff', 'team', 'members', 'employees', 'trustees'];

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

    public $styles = ['default', 'grid'];


    /**
     * The supported block features.
     *
     * @var array
     */
    public $supports = [
        'align' => false,
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
     * Data to be passed to the block before rendering.
     */
    public function with(): array
    {
        $tax_query = get_field('type') ? [
            [
                'taxonomy' => 'role_type',
                'field' => 'term_id',
                'terms' => get_field('type'),
            ],
        ] : null;

        return [
            'title' => get_field('title'),
            'description' => get_field('description'),
            'people' => get_posts(
                [
                    'post_type' => 'person',
                    'posts_per_page' => -1,
                    'tax_query' => $tax_query,
                    'orderby' => 'menu_order',
                    'order' => 'ASC',
                ]
            )
        ];
    }

    /**
     * The block field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('people_list');

        $fields->addText('title');
        $fields->addTextarea('description');

        $fields->addTaxonomy('type', [
            'taxonomy' => 'role_type',
            'add_term' => 0,

        ]);

        return $fields->build();
    }

    /**
     * Retrieve the items.
     *
     * @return array
     */
    // public function items()
    // {
    //     return get_field('items') ?: $this->example['items'];
    // }

    /**
     * Assets enqueued when rendering the block.
     */
    public function assets(array $block): void
    {
        //
    }
}
