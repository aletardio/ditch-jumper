<?php
function ditch_assets() {
  wp_enqueue_style(
    'miosito-style',
    get_stylesheet_uri(),
    array(),
    wp_get_theme()->get('Version')
  );
}
add_action('wp_enqueue_scripts', 'ditch_assets');
