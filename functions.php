<?php

// Including or Hooking the CSS and JS files to our website.
function beautiful_rutheric_files() {
    wp_enqueue_style('beautiful_main_styles', get_theme_file_uri('/build/style-index.css'));
    wp_enqueue_style('beautifu_additional_styles', get_theme_file_uri('/build/index.css'));
}

add_action('wp_enqueue_scripts', 'beautiful_rutheric_files');