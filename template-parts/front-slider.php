<?php
/**
 * Front Page Image Slider
 *
 * @package Better_Days
 */

$slides = array(
	array(
		'image' => get_template_directory_uri() . '/assets/images/slider-1.svg',
		'alt'   => __( 'Team planning strategy around a table', 'better-days' ),
	),
	array(
		'image' => get_template_directory_uri() . '/assets/images/slider-2.svg',
		'alt'   => __( 'Business owner reviewing project notes', 'better-days' ),
	),
	array(
		'image' => get_template_directory_uri() . '/assets/images/slider-3.svg',
		'alt'   => __( 'Client conversation in a modern office', 'better-days' ),
	),
	array(
		'image' => get_template_directory_uri() . '/assets/images/slider-4.svg',
		'alt'   => __( 'Progress dashboard with growth indicators', 'better-days' ),
	),
);
?>

<section class="home-slider" aria-label="<?php esc_attr_e( 'Featured highlights', 'better-days' ); ?>">
	<div class="container">
		<div class="home-slider__frame" data-home-slider>
			<div class="home-slider__track">
				<?php foreach ( $slides as $index => $slide ) : ?>
					<figure class="home-slider__slide<?php echo 0 === $index ? ' is-active' : ''; ?>" data-slide-index="<?php echo esc_attr( $index ); ?>">
						<img src="<?php echo esc_url( $slide['image'] ); ?>" alt="<?php echo esc_attr( $slide['alt'] ); ?>" loading="lazy" />
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
