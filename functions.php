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

    //Events Post Type
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

    // Program Post Type
    register_post_type('Program', array(
        'show_in_rest' => true,
        'support' => array('title', 'editor'),
        'rewrite' => array('slug' => 'programs'),
        'has_archive' => true,
        'public' => true,
        'labels' => array(
            'name' => 'Programs',
            'add_new_item' => 'Add New Program',
            'edit_item' => 'Edit Program',
            'all_items' => 'All Programs',
            'singular_name' => 'Program'
        ),
        'menu_icon' => 'dashicons-awards'
    ));

    // Professor Post Type
    register_post_type('Professor', array(
        'show_in_rest' => true,
        'support' => array('title', 'editor'),
        'public' => true,
        'labels' => array(
            'name' => 'Professors',
            'add_new_item' => 'Add New Professor',
            'edit_item' => 'Edit Professor',
            'all_items' => 'All Professors',
            'singular_name' => 'Professor'
        ),
        'menu_icon' => 'dashicons-welcome-learn-more'
    ));

}

add_action('init', 'beautiful_custom_post_types'); // Must Use Plugin - Ends here.


// Custom Query to control the exclusion of Past Events, and sort the events by dates
function beautiful_adjusted_queries($query) {

    if (!is_admin() AND is_post_type_archive('event') AND $query->is_main_query()) {
        $query->set('orderby', 'title');
        $query->set('order', 'ASC');
        $query->set('post_per_page', '-1');
    }

    if (!is_admin() AND is_post_type_archive('event') AND $query->is_main_query()) {
        $today = date('Ymd');
        $query->set('meta_key', 'event_date');
        $query->set('orderby', 'meta_value_num');
        $query->set('order', 'ASC');
        $query->set('meta_query', array(
            array(
            'key' => 'event_date',
            'compare' => '>=',
            'value' => $today,
            'type' => 'numeric'
            )
          ));
    }
    }
    
    add_action('pre_get_posts', 'beautiful_adjusted_queries');