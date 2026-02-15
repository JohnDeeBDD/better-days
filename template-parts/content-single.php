<?php
/**
 * Template Part: Single Post Content
 *
 * @package Better_Days
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-post-content' ); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="post-featured-image">
			<?php the_post_thumbnail( 'large' ); ?>
		</div>
	<?php endif; ?>

	<div class="post-content entry-content">
		<?php the_content(); ?>

		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'better-days' ),
			'after'  => '</div>',
		) );
		?>
	</div>

	<footer class="post-footer">
		<?php if ( has_tag() ) : ?>
			<div class="post-tags">
				<?php the_tags( '<span class="tags-label">' . esc_html__( 'Tags:', 'better-days' ) . '</span> ', ', ' ); ?>
			</div>
		<?php endif; ?>
	</footer>
</article>
