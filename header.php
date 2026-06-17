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
			<?php if ( has_custom_logo() ) : ?>
				<?php the_custom_logo(); ?>
			<?php else : ?>
				<?php
				// Split the site name so the last word picks up the accent colour
				// (e.g. "Better" in blue, "Days" in orange), echoing the logo.
				$bd_name = trim( get_bloginfo( 'name' ) );
				if ( '' === $bd_name ) {
					$bd_name = 'Better Days';
				}
				$bd_words = preg_split( '/\s+/', $bd_name );
				$bd_last  = array_pop( $bd_words );
				$bd_first = implode( ' ', $bd_words );

				$bd_tagline = trim( get_bloginfo( 'description' ) );
				if ( '' === $bd_tagline ) {
					$bd_tagline = 'Senior Living Search & Advocacy';
				}
				?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-title-link brand-logo" rel="home">
					<svg class="brand-mark" viewBox="0 0 100 100" role="img" aria-hidden="true" focusable="false">
						<defs>
							<linearGradient id="bdMarkBlue" x1="0" y1="0" x2="0" y2="1">
								<stop offset="0" stop-color="#2BA8E0" />
								<stop offset="1" stop-color="#0E66A0" />
							</linearGradient>
							<linearGradient id="bdMarkGreen" x1="0" y1="0" x2="1" y2="1">
								<stop offset="0" stop-color="#A6D635" />
								<stop offset="1" stop-color="#4E8035" />
							</linearGradient>
						</defs>
						<path d="M50 92 C 16 72, 12 34, 40 14 C 48 30, 50 56, 50 92 Z" fill="url(#bdMarkBlue)" />
						<path d="M50 92 C 84 72, 88 34, 60 14 C 52 30, 50 56, 50 92 Z" fill="url(#bdMarkGreen)" />
						<path d="M50 88 C 40 66, 36 40, 41 20" fill="none" stroke="#ffffff" stroke-opacity="0.5" stroke-width="2" stroke-linecap="round" />
						<path d="M50 88 C 60 66, 64 40, 59 20" fill="none" stroke="#ffffff" stroke-opacity="0.4" stroke-width="2" stroke-linecap="round" />
					</svg>
					<span class="brand-text">
						<span class="brand-name">
							<?php if ( '' !== $bd_first ) : ?>
								<span class="brand-name__primary"><?php echo esc_html( $bd_first ); ?></span> <span class="brand-name__accent"><?php echo esc_html( $bd_last ); ?></span>
							<?php else : ?>
								<span class="brand-name__primary"><?php echo esc_html( $bd_last ); ?></span>
							<?php endif; ?>
						</span>
						<span class="brand-tagline"><?php echo esc_html( $bd_tagline ); ?></span>
					</span>
				</a>
			<?php endif; ?>
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
