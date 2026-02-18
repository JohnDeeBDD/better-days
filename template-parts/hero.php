<?php
/**
 * Template Part: Hero Section
 *
 * @package Better_Days
 */

$front_page_defaults = better_days_front_page_defaults();

$heading    = get_theme_mod( 'better_days_hero_heading', $front_page_defaults['hero']['heading'] );
$text       = get_theme_mod( 'better_days_hero_text', $front_page_defaults['hero']['text'] );
$btn_text   = get_theme_mod( 'better_days_hero_button_text', $front_page_defaults['hero']['button_text'] );
$btn_url    = get_theme_mod( 'better_days_hero_button_url', $front_page_defaults['hero']['button_url'] );
$hero_image = get_theme_mod( 'better_days_hero_image', $front_page_defaults['hero']['image'] );

$style = '';
if ( $hero_image ) {
	$style = ' style="background-image: url(' . esc_url( $hero_image ) . ');"';
}
?>

<section class="hero-section"<?php echo $style; ?>>
	<div class="hero-overlay"></div>
	<div class="container hero-inner">
		<div class="hero-content animate-fade-up">
			<h1 class="hero-heading"><?php echo esc_html( $heading ); ?></h1>
			<p class="hero-text"><?php echo esc_html( $text ); ?></p>
			<?php if ( $btn_text ) : ?>
				<a href="<?php echo esc_url( $btn_url ); ?>" class="btn btn-primary btn-lg">
					<?php echo esc_html( $btn_text ); ?>
					<span class="btn-arrow">&rarr;</span>
				</a>
			<?php endif; ?>
		</div>
	</div>
</section>
