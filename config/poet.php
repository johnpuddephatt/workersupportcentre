<?php


return [
    /*
    |--------------------------------------------------------------------------
    | Post Types
    |--------------------------------------------------------------------------
    |
    | Here you may specify the post types to be registered by Poet using the
    | Extended CPTs library. <https://github.com/johnbillion/extended-cpts>
    |
    */

    'post' => [


        'opportunity' => [
            'enter_title_here' => 'Enter job title',
            'menu_icon' => 'dashicons-pressthis',
            'supports' => ['title', 'editor', 'author', 'revisions'],
            'show_in_rest' => true,
            'has_archive' => false,
            'labels' => [
                'singular' => 'Job',
                'plural' => 'Jobs',
            ],
        ],

        'sector' => [
            'enter_title_here' => 'Enter sector title',
            'menu_icon' => 'dashicons-image-filter',
            'supports' => ['title', 'thumbnail', 'excerpt', 'editor', 'author', 'revisions'],
            'show_in_rest' => true,
            'has_archive' => false,
            'labels' => [
                'singular' => 'Sector',
                'plural' => 'Sectors',
            ],
        ],


        'resource' => [
            'enter_title_here' => 'Enter resource title',
            'menu_icon' => 'dashicons-category',
            'supports' => ['title', 'author', 'revisions'],
            'show_in_rest' => true,
            'has_archive' => false,
            'labels' => [
                'singular' => 'Resource',
                'plural' => 'Resources',
            ],
        ],

        'person' => [
            'enter_title_here' => 'Enter person’s name',
            'menu_icon' => 'dashicons-networking',
            'supports' => ['thumbnail', 'title', 'editor'],
            'show_in_rest' => true,
            'exclude_from_search' => true,
            'has_archive' => false,
            'labels' => [
                'singular' => 'Person',
                'plural' => 'Staff & trustees',
            ],
            'rewrite' => [
                'slug' => 'people',
            ],
            'admin_cols' => [
                'role_type' => [
                    'taxonomy' => 'role_type'
                ],
                'role_title' => [
                    'title_cb'    => function () {
                        return 'Role title';
                    },
                    'meta_key'    => '_role_title',
                ],
            ],
            'admin_filters' => [
                'role_type' => [
                    'taxonomy' => 'role_type'
                ],
            ],
        ],


    ],

    /*
    |--------------------------------------------------------------------------
    | Taxonomies
    |--------------------------------------------------------------------------
    |
    | Here you may specify the taxonomies to be registered by Poet using the
    | Extended CPTs library. <https://github.com/johnbillion/extended-cpts>
    |
    */

    'taxonomy' => [
        'resource_type' => [
            'title' => 'Title',
            'links' => ['resource'],
            'meta_box' => 'simple',
        ],
        'role_type' => [
            'title' => 'Title',
            'links' => ['person'],
            'meta_box' => 'simple',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Blocks
    |--------------------------------------------------------------------------
    |
    | Here you may specify the block types to be registered by Poet and
    | rendered using Blade.
    |
    | Blocks are registered using the `namespace/label` defined when
    | registering the block with the editor. If no namespace is provided,
    | the current theme text domain will be used instead.
    |
    | Given the block `sage/accordion`, your block view would be located at:
    |   ↪ `views/blocks/accordion.blade.php`
    |
    | Block views have the following variables available:
    |   ↪ $data    – An object containing the block data.
    |   ↪ $content – A string containing the InnerBlocks content.
    |                Returns `null` when empty.
    |
    */

    // 'block' => [
    //     'sage/accordion' => [
    //         'categories' => ['all'],

    //         'attributes' => [
    //             'title' => [
    //                 'default' => 'Lorem ipsum',
    //                 'type' => 'string',
    //             ],
    //         ],
    //     ],
    // ],

    /*
    |--------------------------------------------------------------------------
    | Block Categories
    |--------------------------------------------------------------------------
    |
    | Here you may specify block categories to be registered by Poet for use
    | in the editor.
    |
    */

    // 'block_category' => [
    // 'cta' => [
    //     'title' => 'Call to Action',
    //     'icon' => 'star-filled',
    // ],
    // ],

    /*
    |--------------------------------------------------------------------------
    | Block Patterns
    |--------------------------------------------------------------------------
    |
    | Here you may specify block patterns to be registered by Poet for use
    | in the editor.
    |
    | Patterns are registered using the `namespace/label` defined when
    | registering the block with the editor. If no namespace is provided,
    | the current theme text domain will be used instead.
    |
    | Given the pattern `sage/hero`, your pattern content would be located at:
    |   ↪ `views/block-patterns/hero.blade.php`
    |
    | See: https://developer.wordpress.org/reference/functions/register_block_pattern/
    */

    // 'block_pattern' => [
    //     'sage/hero' => [
    //         'title' => 'Page Hero',
    //         'description' => 'Draw attention to the main focus of the page, and highlight key CTAs',
    //         'categories' => ['all'],
    //     ],
    // ],

    /*
    |--------------------------------------------------------------------------
    | Block Pattern Categories
    |--------------------------------------------------------------------------
    |
    | Here you may specify block pattern categories to be registered by Poet for
    | use in the editor.
    |
    */

    'block_pattern_category' => [
        'all' => [
            'label' => 'All Patterns',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Editor Palette
    |--------------------------------------------------------------------------
    |
    | Here you may specify the color palette registered in the Gutenberg
    | editor.
    |
    | A color palette can be passed as an array or by passing the filename of
    | a JSON file containing the palette.
    |
    | If a color is passed a value directly, the slug will automatically be
    | converted to Title Case and used as the color name.
    |
    | If the palette is explicitly set to `true` – Poet will attempt to
    | register the palette using the default `palette.json` filename generated
    | by <https://github.com/roots/palette-webpack-plugin>
    |
    */

    'palette' => [
        // 'red' => '#ff0000',
        // 'blue' => '#0000ff',
    ],

    /*
    |--------------------------------------------------------------------------
    | Admin Menu
    |--------------------------------------------------------------------------
    |
    | Here you may specify admin menu item page slugs you would like moved to
    | the Tools menu in an attempt to clean up unwanted core/plugin bloat.
    |
    | Alternatively, you may also explicitly pass `false` to any menu item to
    | remove it entirely.
    |
    */

    'admin_menu' => [
        // 'gutenberg',
    ],
];
