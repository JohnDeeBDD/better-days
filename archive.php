<?php
/**
 * Archive Template
 *
 * @package Better_Days
 */

get_header();
?>

<div class="page-hero">
	<div class="container">
		<?php the_archive_title( '<h1 class="page-hero-title">', '</h1>' ); ?>
		<?php the_archive_description( '<p class="page-hero-desc">', '</p>' ); ?>
	</div>
</div>

<div class="container content-area">
	<div class="content-wrapper">
		<div class="primary-content">
			<?php if ( have_posts() ) : ?>
				<div class="posts-grid">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'template-parts/content', get_post_type() ); ?>
					<?php endwhile; ?>
				</div>

				<?php the_posts_pagination( array(
					'mid_size'  => 2,
					'prev_text' => esc_html__( '&laquo; Previous', 'better-days' ),
					'next_text' => esc_html__( 'Next &raquo;', 'better-days' ),
				) ); ?>
			<?php else : ?>
				<?php get_template_part( 'template-parts/content', 'none' ); ?>
			<?php endif; ?>
		</div>

		<?php get_sidebar(); ?>
	</div>
</div>

<?php
get_footer();
