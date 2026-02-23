<?php
/**
 * Front Page Image Slider
 *
 * @package Better_Days
 */

$slides = array(
	array(
		'type'        => 'linkedin',
		'url'         => 'https://www.linkedin.com/in/trish-karlinski-0327b5243',
		'title'       => __( "Connect with Trish Karolynski on LinkedIn", 'better-days' ),
		'description' => __( 'Visit Trish\'s LinkedIn profile to learn more about her background and connect directly.', 'better-days' ),
	),
	array(
		'type'  => 'image',
		'image' => get_template_directory_uri() . '/assets/images/slider-2.svg',
		'alt'   => __( 'Senior care coordinator reviewing onboarding paperwork', 'better-days' ),
	),
	array(
		'type'  => 'image',
		'image' => get_template_directory_uri() . '/assets/images/slider-3.svg',
		'alt'   => __( 'Family receiving retirement home placement guidance', 'better-days' ),
	),
	array(
		'type'  => 'image',
		'image' => get_template_directory_uri() . '/assets/images/slider-4.svg',
		'alt'   => __( 'Comfortable residence supporting around-the-clock nursing care', 'better-days' ),
	),
);
?>

<section class="home-slider" aria-label="<?php esc_attr_e( 'Better Days for Seniors highlights', 'better-days' ); ?>">
	<div class="container">
		<div class="home-slider__frame" data-home-slider>
			<div class="home-slider__track">
				<?php foreach ( $slides as $index => $slide ) : ?>
					<figure class="home-slider__slide<?php echo 0 === $index ? ' is-active' : ''; ?>" data-slide-index="<?php echo esc_attr( $index ); ?>">
						<?php if ( isset( $slide['type'] ) && 'linkedin' === $slide['type'] ) : ?>
							<a class="home-slider__linkedin" href="<?php echo esc_url( $slide['url'] ); ?>" target="_blank" rel="noopener noreferrer">
								<span class="home-slider__linkedin-label"><?php esc_html_e( 'LinkedIn', 'better-days' ); ?></span>
								<h3><?php echo esc_html( $slide['title'] ); ?></h3>
								<p><?php echo esc_html( $slide['description'] ); ?></p>
								<span class="home-slider__linkedin-cta"><?php esc_html_e( 'View Profile', 'better-days' ); ?></span>
							</a>
						<?php else : ?>
							<img src="<?php echo esc_url( $slide['image'] ); ?>" alt="<?php echo esc_attr( $slide['alt'] ); ?>" loading="lazy" />
						<?php endif; ?>
					</figure>
				<?php endforeach; ?>
			</div>

			<button class="home-slider__control home-slider__control--prev" type="button" data-slider-prev aria-label="<?php esc_attr_e( 'Previous slide', 'better-days' ); ?>">
				<span aria-hidden="true">&#10094;</span>
			</button>
			<button class="home-slider__control home-slider__control--next" type="button" data-slider-next aria-label="<?php esc_attr_e( 'Next slide', 'better-days' ); ?>">
				<span aria-hidden="true">&#10095;</span>
			</button>
		</div>

		<div class="home-slider__dots" aria-label="<?php esc_attr_e( 'Choose slide', 'better-days' ); ?>">
			<?php foreach ( $slides as $index => $slide ) : ?>
				<button class="home-slider__dot<?php echo 0 === $index ? ' is-active' : ''; ?>" type="button" data-slider-dot="<?php echo esc_attr( $index ); ?>" aria-label="<?php echo esc_attr( sprintf( __( 'Go to slide %d', 'better-days' ), $index + 1 ) ); ?>"></button>
			<?php endforeach; ?>
		</div>
	</div>
</section>
