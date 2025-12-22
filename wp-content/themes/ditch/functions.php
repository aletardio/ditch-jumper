<?php
function ditch_assets() {
  wp_enqueue_style(
    'ditch-jumper-style',
    get_stylesheet_directory_uri() . '/assets/css/style.css',
    array(),
    wp_get_theme()->get('Version')
  );
}
add_action('wp_enqueue_scripts', 'ditch_assets');

<?php
function ditch_setup() {
  register_nav_menus([
    'main-menu' => __('Menu principale', 'ditch-jumper'),
  ]);
}
add_action('after_setup_theme', 'ditch_setup');

