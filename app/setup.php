<?php

/**
 * Theme setup.
 */

namespace App;

use Illuminate\Support\Facades\Vite;

/**
 * Inject styles into the block editor.
 *
 * @return array
 */
add_filter('block_editor_settings_all', function ($settings) {
    $style = Vite::asset('resources/css/editor.css');

    $settings['styles'][] = [
        'css' => "@import url('{$style}')",
    ];

    return $settings;
});

/**
 * Inject scripts into the block editor.
 *
 * @return void
 */
add_filter('admin_head', function () {
    if (! get_current_screen()?->is_block_editor()) {
        return;
    }

    $dependencies = json_decode(Vite::content('editor.deps.json'));

    foreach ($dependencies as $dependency) {
        if (! wp_script_is($dependency)) {
            wp_enqueue_script($dependency);
        }
    }

    echo Vite::withEntryPoints([
        'resources/js/editor.js',
    ])->toHtml();
});

/**
 * Use the generated theme.json file.
 *
 * @return string
 */
add_filter('theme_file_path', function ($path, $file) {
    return $file === 'theme.json'
        ? public_path('build/assets/theme.json')
        : $path;
}, 10, 2);


/**
 * Register the initial theme setup.
 *
 * @return void
 */
add_action('after_setup_theme', function () {




    /**
     * Disable full-site editing support.
     *
     * @link https://wptavern.com/gutenberg-10-5-embeds-pdfs-adds-verse-block-color-options-and-introduces-new-patterns
     */
    remove_theme_support('block-templates');

    /**
     * Register the navigation menus.
     *
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage'),
        'secondary_navigation' => __('Secondary Navigation', 'sage'),
        'footer_navigation' => __('Footer Navigation', 'sage'),
    ]);

    /**
     * Disable the default block patterns.
     *
     * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-the-default-block-patterns
     */
    remove_theme_support('core-block-patterns');

    /**
     * Enable plugins to manage the document title.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Enable post thumbnail support.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable responsive embed support.
     *
     * @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/#responsive-embedded-content
     */
    add_theme_support('responsive-embeds');

    /**
     * Enable HTML5 markup support.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', [
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'search-form',
        'script',
        'style',
    ]);

    /**
     * Enable selective refresh for widgets in customizer.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#customize-selective-refresh-widgets
     */
    add_theme_support('customize-selective-refresh-widgets');

    add_theme_support('editor-styles');
}, 20);

/**
 * Register the theme sidebars.
 *
 * @return void
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ];

    register_sidebar([
        'name' => __('Primary', 'sage'),
        'id' => 'sidebar-primary',
    ] + $config);

    // register_sidebar([
    //     'name' => __('Footer', 'sage'),
    //     'id' => 'sidebar-footer',
    // ] + $config);
});




add_action('admin_head', function () {
    $screen = get_current_screen();
    // if ($screen && $screen->id === 'settings_page_my_options_page') {
    echo "<style>            
            [data-toolbar='simple'] iframe {
            height: 75px !important;
            min-height: 75px !important;
            }

            [data-toolbar='simple'] .mce-statusbar {
            display: none;
            }

             [data-toolbar='simple'] .mce-top-part {
            display: none;
            }

            .edit-post-fullscreen-mode-close.components-button {
            background-color: #eee;
}

.edit-post-fullscreen-mode-close.components-button:before {
content: none;
}
        </style>";
    // }
});

/**
 * Set the login logo.
 *
 * @return void
 */
add_action('login_enqueue_scripts', function () { ?>
    <style type="text/css">
        #login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri() . '/' . config('app.logo.src'); ?>);
            height: <?php echo config('app.logo.height'); ?>px;
            width: <?php echo config('app.logo.width'); ?>px;
            background-size: 100% auto;
            background-position: center;
            background-repeat: no-repeat;

        }
    </style>
<?php });

/**
 * Register custom image sizes.
 *
 * @return void
 */
foreach (config('app.image_sizes') as $name => $size) {
    add_image_size($name, $size[0], $size[1], $size[2]);
}

// Add the image sizes to the dropdown
add_filter('image_size_names_choose', function ($sizes) {
    $custom_sizes = [];

    foreach (config('app.image_sizes') as $name => $size) {
        if ($size[3] ?? false) {
            $custom_sizes[$name] = ucfirst($name);
        }
    }

    return array_merge($sizes, $custom_sizes);
});


add_action('admin_head', function () {
    echo view('svg')->render();
});

/**
 * Disable ACF menu in production.
 *
 * @return void
 */

if (env('WP_ENV') === 'production') {
    add_action('admin_menu', function () {
        remove_menu_page('edit.php?post_type=acf-field-group');
    });
}

add_action('admin_init', function () {


    foreach (config('app.options_pages') as $key => $value) {
        add_settings_field($key, $value, function ($args) use ($key) {
            wp_dropdown_pages(array(
                'name'              => $key,
                'show_option_none'  => '&mdash; Select &mdash;',
                'option_none_value' => '0',
                'selected'          => get_option($key),
            ));
        }, 'reading', 'default', array(
            'label_for' => 'field-' . $key,
            'class'     => 'row-' . $key,
        ));

        add_filter('allowed_options', function ($options) use ($key) {
            $options['reading'][] = $key;
            return $options;
        });
    }
});
