<?php
/**
 * Theme Footer
 *
 * @package Better_Days
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
</main><!-- #main-content -->

<footer id="site-footer" class="site-footer">
	<div class="footer-widgets">
		<div class="container">
			<div class="footer-columns">
				<div class="footer-col">
					<div class="footer-brand">
						<?php if ( has_custom_logo() ) : ?>
							<?php the_custom_logo(); ?>
						<?php else : ?>
							<span class="footer-site-title"><?php bloginfo( 'name' ); ?></span>
						<?php endif; ?>
						<p class="footer-description"><?php bloginfo( 'description' ); ?></p>
					</div>
					<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
						<?php dynamic_sidebar( 'footer-1' ); ?>
					<?php endif; ?>
				</div>

				<div class="footer-col">
					<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
						<?php dynamic_sidebar( 'footer-2' ); ?>
					<?php else : ?>
						<h4 class="widget-title"><?php esc_html_e( 'Quick Links', 'better-days' ); ?></h4>
						<?php
						wp_nav_menu( array(
							'theme_location' => 'footer',
							'menu_class'     => 'footer-menu',
							'container'      => false,
							'fallback_cb'    => false,
							'depth'          => 1,
						) );
						?>
					<?php endif; ?>
				</div>

				<div class="footer-col">
					<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
						<?php dynamic_sidebar( 'footer-3' ); ?>
					<?php else : ?>
						<h4 class="widget-title"><?php esc_html_e( 'Contact', 'better-days' ); ?></h4>
						<div class="footer-contact">
							<?php
							$email = get_theme_mod( 'better_days_email' );
							$phone = get_theme_mod( 'better_days_phone' );
							?>
							<?php if ( $email ) : ?>
								<p><a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a></p>
							<?php endif; ?>
							<?php if ( $phone ) : ?>
								<p><a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a></p>
							<?php endif; ?>
						</div>
					<?php endif; ?>

					<?php
					$social_networks = array(
						'linkedin'  => 'LinkedIn',
						'facebook'  => 'Facebook',
						'twitter'   => 'Twitter',
						'instagram' => 'Instagram',
					);
					$has_social = false;
					foreach ( $social_networks as $key => $label ) {
						if ( get_theme_mod( "better_days_social_{$key}" ) ) {
							$has_social = true;
							break;
						}
					}
					?>
					<?php if ( $has_social ) : ?>
						<div class="social-links">
							<?php foreach ( $social_networks as $key => $label ) : ?>
								<?php $url = get_theme_mod( "better_days_social_{$key}" ); ?>
								<?php if ( $url ) : ?>
									<a href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener noreferrer" class="social-link social-link--<?php echo esc_attr( $key ); ?>" aria-label="<?php echo esc_attr( $label ); ?>">
										<span class="social-icon"><?php echo esc_html( $label ); ?></span>
									</a>
								<?php endif; ?>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>

	<div class="footer-bottom">
		<div class="container">
			<p class="copyright">
				<?php
				$footer_text = get_theme_mod( 'better_days_footer_text' );
				if ( $footer_text ) {
					echo esc_html( $footer_text );
				} else {
					printf(
						/* translators: %1$s: current year, %2$s: site name */
						esc_html__( '&copy; %1$s %2$s. All rights reserved.', 'better-days' ),
						esc_html( date( 'Y' ) ),
						esc_html( get_bloginfo( 'name' ) )
					);
				}
				?>
			</p>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
