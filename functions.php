<?php

// Including or Hooking the CSS and JS files to our website.
function beautiful_rutheric_files() {
    wp_enqueue_script('main-beauty-js', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
    wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style('fonts-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('beautiful_main_styles', get_theme_file_uri('/build/style-index.css'));
    wp_enqueue_style('beautifu_additional_styles', get_theme_file_uri('/build/index.css'));
}

add_action('wp_enqueue_scripts', 'beautiful_rutheric_files');

// Change What You See in The Window Address Bar (Title Tag)

function beautiful_features() {
    // register_nav_menu('headerMenuLocation', 'Header Menu Location Eric');
    // register_nav_menu('footerLocationOne', 'Footet Location One');
    // register_nav_menu('footerLocationTwo', 'Footet Location Two');
    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'beautiful_features');

// Copypaste this code to a Must Use Plugin
function beautiful_custom_post_types() {
    register_post_type('event', array(
        'show_in_rest' => true,
        'support' => array('title', 'editor', 'excerpt'),
        'rewrite' => array('slug' => 'events'),
        'has_archive' => true,
        'public' => true,
        'labels' => array(
            'name' => 'Events',
            'add_new_item' => 'Add New Event',
            'edit_item' => 'Edit Event',
            'all_items' => 'All Events',
            'singular_name' => 'Event'
        ),
        'menu_icon' => 'dashicons-calendar'
    ));
}

add_action('init', 'beautiful_custom_post_types'); // Must Use Plugin - Ends here.