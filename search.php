<?php
/**
 * Search Results Template
 *
 * @package Better_Days
 */

get_header();
?>

<div class="page-hero">
	<div class="container">
		<h1 class="page-hero-title">
			<?php
			printf(
				/* translators: %s: search query */
				esc_html__( 'Search Results for: %s', 'better-days' ),
				'<span>' . esc_html( get_search_query() ) . '</span>'
			);
			?>
		</h1>
	</div>
</div>

<div class="container content-area">
	<div class="content-wrapper">
		<div class="primary-content">
			<?php if ( have_posts() ) : ?>
				<div class="posts-grid">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'template-parts/content', 'search' ); ?>
					<?php endwhile; ?>
				</div>

				<?php the_posts_pagination( array(
					'mid_size'  => 2,
					'prev_text' => esc_html__( '&laquo; Previous', 'better-days' ),
					'next_text' => esc_html__( 'Next &raquo;', 'better-days' ),
				) ); ?>
			<?php else : ?>
				<div class="no-results">
					<h2><?php esc_html_e( 'Nothing Found', 'better-days' ); ?></h2>
					<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with different keywords.', 'better-days' ); ?></p>
					<?php get_search_form(); ?>
				</div>
			<?php endif; ?>
		</div>

		<?php get_sidebar(); ?>
	</div>
</div>

<?php
get_footer();
