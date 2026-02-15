<?php
/**
 * Template Part: Page Content
 *
 * @package Better_Days
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'page-content' ); ?>>
	<div class="entry-content">
		<?php the_content(); ?>

		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'better-days' ),
			'after'  => '</div>',
		) );
		?>
	</div>
</article>
