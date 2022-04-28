<?php

function beautiful_rutheric_files() {
    wp_enqueue_style('beautiful_main_styles', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'beautiful_rutheric_files');