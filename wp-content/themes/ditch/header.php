<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ditch_Jumper
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'ditch' ); ?></a>

	<header role="banner" id="masthead" class="site-header">
		<div class="site-header__inner">
			<div class="col-4 site-header__col site-header__col--logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-header__logo">
					<img
					src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/DITCH-JUMPER.svg' ); ?>"
					alt="Ditch Jumper"
					>
				</a>
			</div>

			<div class="col-6 site-header__col site-header__col--nav">
				<nav id="site-navigation"
					class="main-navigation"
					aria-label="<?php esc_attr_e( 'Primary menu', 'ditch' ); ?>">
					<button class="menu-toggle"
							aria-controls="primary-menu"
							aria-expanded="false">
					<?php esc_html_e( 'Primary Menu', 'ditch' ); ?>
					</button>

					<?php
					wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'container'      => false,
						'menu_class'     => 'main-navigation__list',
					)
					);
					?>
				</nav>
			</div>

			<div class="col-2 site-header__col site-header__col--cta">
				<button class="btn btn-primary text-xxs">Contattaci</button>
			</div>
		</div>
	</header>

