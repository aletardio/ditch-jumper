<?php
/**
 * Ditch Jumper functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Ditch_Jumper
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ditch_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Ditch Jumper, use a find and replace
		* to change 'ditch' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'ditch', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'Menu' => esc_html__( 'Menu Principale', 'ditch' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'ditch_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'ditch_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ditch_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ditch_content_width', 640 );
}
add_action( 'after_setup_theme', 'ditch_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ditch_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'ditch' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'ditch' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'ditch_widgets_init' );

/**
 * Registra il post type "macchine"
 */
function ditch_register_macchine_post_type() {
    register_post_type( 'macchina',
        array(
            'labels'      => array(
                'name'          => __( 'Macchine' ),
                'singular_name' => __( 'Macchina' ),
            ),
            'public'      => true,
            'has_archive' => true,
            'supports'    => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
            'menu_icon'   => 'dashicons-car',
        )
    );
}
add_action( 'init', 'ditch_register_macchine_post_type' );

// Forza il flush delle rewrite rules per il nuovo post type
function ditch_flush_rewrite_rules() {
    ditch_register_macchine_post_type();
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'ditch_flush_rewrite_rules' );

/**
 * Enqueue scripts and styles.
 */
function ditch_scripts() {
    // Carica il file CSS principale
    $style_css = '/assets/css/style.css';
    if (file_exists(get_template_directory() . $style_css)) {
        wp_enqueue_style(
            'ditch-style',
            get_template_directory_uri() . $style_css,
            array(),
            filemtime(get_template_directory() . $style_css)
        );
        wp_style_add_data('ditch-style', 'rtl', 'replace');
    }

    // Carica il file JavaScript di navigazione
    $js_file = '/js/navigation.js';
    if (file_exists(get_template_directory() . $js_file)) {
        wp_enqueue_script(
            'ditch-navigation',
            get_template_directory_uri() . $js_file,
            array(),
            filemtime(get_template_directory() . $js_file),
            true
        );
    }

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action( 'wp_enqueue_scripts', 'ditch_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

