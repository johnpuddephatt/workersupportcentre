<?php

namespace App\Blocks;

use Args\get_posts;
use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class ResourceList extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Resource List';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'List resources';

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
     * The default block spacing.
     *
     * @var array
     */
    public $spacing = [
        'padding' => null,
        'margin' => null,
    ];

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
            'gradients' => false,
        ],
        'spacing' => [
            'padding' => false,
            'margin' => false,
        ],
    ];



    /**
     * Data to be passed to the block before rendering.
     */
    public function with(): array
    {

        $tax_query = [];

        if ($_GET['type'] ?? false) {
            $tax_query[] = [
                'taxonomy' => 'resource_type',
                'field' => 'id',
                'terms' => $_GET['type'],
            ];
        };


        $post_query =  [
            'post_type' => 'resource',
            'posts_per_page' => -1,
            'tax_query' => $tax_query,
        ];

        if ($_GET['search'] ?? false) {
            $post_query['s'] = $_GET['search'];
            $post_query['tag__in'] = explode(' ', $_GET['search']);
        }




        return [
            'resources' => get_posts(
                $post_query
            ),
            'types' => get_terms(
                [
                    'taxonomy' => 'resource_type',
                    'hide_empty' => true,
                ]
            ),
        ];
    }

    /**
     * The block field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('resource_list');
        return $fields->build();
    }
}
