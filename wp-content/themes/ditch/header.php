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
			<div class="col-4 site-header__col site-header__col--logo _70">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-header__logo">
					<img
					src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/DITCH JUMPER.svg' ); ?>"
					alt="Ditch Jumper"
					>
				</a>
			</div>

			<!-- Menu Tablet / Mobile -->
			<div class="site-header__col--nav">
                <div class="mobile-menu-header">
					<div class="_70">
						<img style="filter:invert(1)"
						src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/DITCH JUMPER.svg' ); ?>"
						alt="Ditch Jumper"
						>
					</div>
					<div class="_30">
						<button class="mobile-menu-close" aria-label="Chiudi menu">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M18 6L6 18M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</button>
					</div>
                </div>
				<nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e('Menu principale', 'ditch'); ?>">
					<?php
					wp_nav_menu(array(
						'theme_location' => 'Menu',
						'menu_id'        => 'primary-menu',
						'container'      => false,
						'menu_class'     => 'main-navigation__list',
						'fallback_cb'    => false,
					));
					?>
				</nav>
			</div>

			<div class="col-2 site-header__col site-header__col--cta _30">
				<button class="btn btn-primary text-xxs">Contattaci</button>
				<!-- Hamburger Button per Mobile -->
				<button class="mobile-menu-toggle" aria-label="Menu" aria-expanded="false" aria-controls="primary-menu">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/hamburger.svg' ); ?>" alt="Menu" class="hamburger-icon">
				</button>
			</div>

			<!-- Overlay per il menu mobile -->
			<div class="mobile-menu-overlay"></div>
		</div>
	</header>