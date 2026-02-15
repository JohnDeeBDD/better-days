<?php
/**
 * Page Template
 *
 * @package Better_Days
 */

get_header();
?>

<div class="page-hero">
	<div class="container">
		<h1 class="page-hero-title"><?php the_title(); ?></h1>
	</div>
</div>

<div class="container content-area">
	<div class="content-wrapper">
		<div class="primary-content">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php if ( comments_open() || get_comments_number() ) : ?>
					<?php comments_template(); ?>
				<?php endif; ?>
			<?php endwhile; ?>
		</div>
	</div>
</div>

<?php
get_footer();
