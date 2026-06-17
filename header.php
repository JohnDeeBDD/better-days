<?php
/**
 * Theme Header
 *
 * @package Better_Days
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header id="site-header" class="site-header">
	<div class="container header-inner">
		<div class="site-branding">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-title-link bd-logo" rel="home">
				<span class="bd-word">
					<span class="bd-better">Better</span>
					<span class="bd-days">Days</span>
				</span>
				<svg class="bd-swoosh" viewBox="0 0 640 50" preserveAspectRatio="none" aria-hidden="true" focusable="false">
					<path d="M14 36 Q 320 6 628 22" stroke="#2ba0d8" stroke-width="5" fill="none" stroke-linecap="round"/>
					<path d="M14 44 Q 320 18 624 14" stroke="#6cbf3a" stroke-width="5" fill="none" stroke-linecap="round"/>
				</svg>
				<span class="bd-tagline">Senior Living Search &amp; Advocacy</span>
			</a>
		</div>

		<button class="menu-toggle" aria-controls="primary-navigation" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'better-days' ); ?>">
			<span class="hamburger-line"></span>
			<span class="hamburger-line"></span>
			<span class="hamburger-line"></span>
		</button>

		<nav id="primary-navigation" class="primary-navigation" aria-label="<?php esc_attr_e( 'Primary Navigation', 'better-days' ); ?>">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'menu_class'     => 'nav-menu',
				'container'      => false,
				'fallback_cb'    => 'better_days_page_menu_fallback',
				'depth'          => 2,
			) );
			?>
		</nav>
	</div>
</header>

<main id="main-content" class="site-main">
