<?php
/**
 * Template Part: Testimonials Section
 *
 * @package Better_Days
 */

$heading = get_theme_mod( 'better_days_testimonials_heading', 'What Our Clients Say' );

$default_testimonials = array(
	array(
		'text' => 'Their strategic approach transformed the way we operate. The team brought clarity to our planning process and helped us achieve goals we thought were years away.',
		'name' => 'Sarah Johnson',
		'role' => 'CEO, Growth Partners Inc.',
	),
	array(
		'text' => 'Working with them was a turning point for our organization. Their collaborative style and deep expertise made the entire process smooth and incredibly productive.',
		'name' => 'Michael Chen',
		'role' => 'Director of Operations',
	),
	array(
		'text' => 'They took the time to truly understand our business before offering solutions. The results speak for themselves — our revenue grew 40% in the first year.',
		'name' => 'Lisa Martinez',
		'role' => 'Founder, Bright Path Services',
	),
);

$testimonials = array();
for ( $i = 1; $i <= 3; $i++ ) {
	$text = get_theme_mod( "better_days_testimonial_{$i}_text" );
	$name = get_theme_mod( "better_days_testimonial_{$i}_name" );
	$role = get_theme_mod( "better_days_testimonial_{$i}_role" );

	if ( $text && $name ) {
		$testimonials[] = array(
			'text' => $text,
			'name' => $name,
			'role' => $role,
		);
	}
}

if ( empty( $testimonials ) ) {
	$testimonials = $default_testimonials;
}
?>

<section class="testimonials-section" id="testimonials">
	<div class="container">
		<div class="section-header animate-fade-up">
			<h2 class="section-title"><?php echo esc_html( $heading ); ?></h2>
		</div>

		<div class="testimonials-grid">
			<?php foreach ( $testimonials as $index => $testimonial ) : ?>
				<div class="testimonial-card animate-fade-up" style="animation-delay: <?php echo esc_attr( $index * 0.15 ); ?>s;">
					<div class="testimonial-quote">
						<svg class="quote-icon" viewBox="0 0 32 32" fill="currentColor" width="32" height="32">
							<path d="M6 18h6l-4 8h4l4-8V6H6v12zm16 0h6l-4 8h4l4-8V6H22v12z"/>
						</svg>
						<p class="testimonial-text"><?php echo esc_html( $testimonial['text'] ); ?></p>
					</div>
					<div class="testimonial-author">
						<div class="author-avatar">
							<?php echo esc_html( mb_substr( $testimonial['name'], 0, 1 ) ); ?>
						</div>
						<div class="author-info">
							<strong class="author-name"><?php echo esc_html( $testimonial['name'] ); ?></strong>
							<?php if ( ! empty( $testimonial['role'] ) ) : ?>
								<span class="author-role"><?php echo esc_html( $testimonial['role'] ); ?></span>
							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
