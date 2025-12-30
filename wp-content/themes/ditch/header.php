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
	<header role="banner" id="masthead" class="site-header">
		<div class="site-header__inner">
			<div class="col-4 site-header__col site-header__col--logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-header__logo">
					<img
					src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/DITCH JUMPER.svg' ); ?>"
					alt="Ditch Jumper"
					>
				</a>
			</div>

			<div class="col-6 site-header__col site-header__col--nav">
				<nav id="site-navigation"
					class="main-navigation"
					aria-label="<?php esc_attr_e( 'Primary menu', 'ditch' ); ?>">

					<?php
					wp_nav_menu(array(
						'theme_location' => 'Menu',  // Deve corrispondere esattamente al nome registrato
						'menu_id'        => 'primary-menu',
						'container'      => false,
						'menu_class'     => 'main-navigation__list',
					));
					?>
				</nav>
				<!-- Hamburger Button per Mobile -->
				<button class="mobile-menu-toggle" aria-label="Menu" aria-expanded="false" aria-controls="primary-menu">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/hamburger.svg' ); ?>" alt="Menu" class="hamburger-icon">
				</button>
			</div>

			<div class="col-2 site-header__col site-header__col--cta">
				<button class="btn btn-primary text-xxs">Contattaci</button>
			</div>

			<!-- Overlay per il menu mobile -->
			<div class="mobile-menu-overlay"></div>
		</div>
	</header>

