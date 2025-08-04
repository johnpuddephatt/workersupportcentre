<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class LatestNews extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Latest News';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Latest news';

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
    public $icon = 'document';

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
        'mode' => true,
        'multiple' => true,
        'jsx' => false,
        'color' => [
            'background' => true,
            'text' => false,
            'gradient' => false,
        ],
    ];



    /**
     * The block styles.
     *
     * @var array
     */
    // public $styles = ['default', 'compact'];

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

        if ($category = get_field('categories')) {
            $filter = [
                'relation' => 'AND',
            ];
            $filter[] =
                [
                    'taxonomy' => 'category',
                    'field' => 'id',
                    'terms' => $category,
                ];
        }

        if ($_GET['category'] ?? false) {
            $filter = [
                'relation' => 'AND',
            ];
            $filter[] = [
                'taxonomy' => 'category',
                'field' => 'id',
                'terms' => $_GET['category'],
            ];
        };

        $posts = get_posts([
            'posts_per_page' => get_field('number'),
            'post_type' => 'post',
            // if category is selected, filter by category
            'tax_query' => $filter ?? false,
            's' => $_GET['search'] ?? false,

        ]);

        if ($_GET['search'] ?? false) {
            $tagged_posts = get_posts([
                'posts_per_page' => get_field('number'),
                'post_type' => 'post',
                'paged' => (int) $currentPage,

                // if category is selected, filter by category
                'tax_query' =>  [
                    [
                        'taxonomy' => 'post_tag',
                        'field' => 'name',
                        'terms' => explode(' ', trim($_GET['search'])),
                        'operator' => 'IN',
                    ]
                ],
            ]);
            $posts = array_merge($posts, $tagged_posts);

            $unique_posts = array();
            $post_ids = array();

            foreach ($posts as $post) {
                if (!in_array($post->ID, $post_ids)) {
                    $unique_posts[] = $post;
                    $post_ids[] = $post->ID;
                }
            }

            $posts = $unique_posts;
        }






        return [
            'title' => get_field('title'),
            'news' => $posts,
            'read_more_link' => get_field('read_more_link'),
            'show_excerpt' => get_field('show_excerpt'),
            'show_image' => get_field('show_image'),
            'image' => get_field('image'),
            'show_filter' => get_field('show_filter'),
            'categories' => get_terms(
                [
                    'taxonomy' => 'category',
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
        $fields = Builder::make('latest_news');

        $fields
            ->addText('title')
            ->addImage('image', [
                'return_format' => 'id',
            ])
            ->addTaxonomy('categories', [
                'taxonomy' => 'category',
                'field_type' => 'multi_select',
                'allow_null' => true,
                'required' => false,
            ])
            ->addNumber('number', [
                'default_value' => 3,
                'min' => 1,

            ])
            ->addTrueFalse('show_excerpt')
            ->addTrueFalse('show_image', [
                'default_value' => true,
            ])
            ->addLink('read_more_link')
            ->addTrueFalse('show_filter');
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
