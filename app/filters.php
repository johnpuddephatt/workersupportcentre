<?php

/**
 * Theme filters.
 */

namespace App;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return sprintf(' &hellip;');
});

/*
 * Excerpt length
 *  
 * @return int
 */
add_filter('excerpt_length', function () {
    return 15;
}, 999);

/**
 * Make page index the default page.
 *
 * @return string
 */

add_action('load-index.php', function () {
    wp_redirect(admin_url('edit.php?post_type=page'));
});


/**
 * Use the no-cookie version of YouTube embeds.
 *
 * @return string
 */
// add_filter('embed_oembed_html', function ($html) {
//     if (str_contains($html, 'youtube.com')) {
//         $html = str_replace('youtube.com', 'youtube-nocookie.com', $html);
//     }
//     return $html;
// }, 10);

/**
 * Remove the WordPress admin menu items.
 *
 * @return void
 */
add_filter(
    'admin_menu',
    function ($menu) {
        remove_menu_page('index.php');
        remove_submenu_page('widgets.php', add_query_arg('return', urlencode(remove_query_arg(wp_removable_query_args(), wp_unslash($_SERVER['REQUEST_URI']))), 'widgets.php'));
    }
);

add_filter('acf/fields/wysiwyg/toolbars', function ($toolbars) {
    $toolbars['Simple'] = [];
    // $toolbars['Simple'][1] = ['bold', 'italic', 'underline', 'link', 'unlink'];
    $toolbars['Simple'][1] = ['bold', 'italic'];
    return $toolbars;
});

add_filter('acf_svg_icon_picker_folder', function () {
    return 'resources/icons/';
});
