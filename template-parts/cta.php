<?php
/**
 * Template Part: Call to Action Section
 *
 * @package Better_Days
 */

$heading  = get_theme_mod( 'better_days_cta_heading', "Let's Start a Conversation" );
$text     = get_theme_mod( 'better_days_cta_text', 'Ready to take your business to the next level? We would love to hear from you.' );
$btn_text = get_theme_mod( 'better_days_cta_button_text', 'Contact Us' );
$btn_url  = get_theme_mod( 'better_days_cta_button_url', '/contact' );
$email    = get_theme_mod( 'better_days_email' );
$phone    = get_theme_mod( 'better_days_phone' );
?>

<section class="cta-section" id="contact">
	<div class="container">
		<div class="cta-inner animate-fade-up">
			<h2 class="cta-heading"><?php echo esc_html( $heading ); ?></h2>
			<p class="cta-text"><?php echo esc_html( $text ); ?></p>

			<div class="cta-actions">
				<?php if ( $btn_text ) : ?>
					<a href="<?php echo esc_url( $btn_url ); ?>" class="btn btn-white btn-lg">
						<?php echo esc_html( $btn_text ); ?>
					</a>
				<?php endif; ?>
			</div>

			<?php if ( $email || $phone ) : ?>
				<div class="cta-contact-info">
					<?php if ( $email ) : ?>
						<a href="mailto:<?php echo esc_attr( $email ); ?>" class="cta-contact-link">
							<?php echo esc_html( $email ); ?>
						</a>
					<?php endif; ?>
					<?php if ( $email && $phone ) : ?>
						<span class="cta-separator">|</span>
					<?php endif; ?>
					<?php if ( $phone ) : ?>
						<a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ); ?>" class="cta-contact-link">
							<?php echo esc_html( $phone ); ?>
						</a>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
