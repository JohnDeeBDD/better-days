<?php
/**
 * Main Index Template
 *
 * @package Better_Days
 */

get_header();
?>

<div class="container content-area">
	<div class="content-wrapper">
		<div class="primary-content">
			<?php if ( have_posts() ) : ?>

				<?php if ( is_home() && ! is_front_page() ) : ?>
					<header class="page-header">
						<h1 class="page-title"><?php single_post_title(); ?></h1>
					</header>
				<?php endif; ?>

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
