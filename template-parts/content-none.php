<?php
/**
 * Template Part: No Content Found
 *
 * @package Better_Days
 */
?>

<section class="no-results">
	<h2><?php esc_html_e( 'Nothing Found', 'better-days' ); ?></h2>

	<?php if ( is_search() ) : ?>
		<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with different keywords.', 'better-days' ); ?></p>
		<?php get_search_form(); ?>
	<?php else : ?>
		<p><?php esc_html_e( 'It seems we can\'t find what you\'re looking for. Perhaps searching can help.', 'better-days' ); ?></p>
		<?php get_search_form(); ?>
	<?php endif; ?>
</section>
