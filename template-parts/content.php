<?php
/**
 * Template Part: Post Content (Archive/Index)
 *
 * @package Better_Days
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card' ); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="post-card-image">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'medium_large' ); ?>
			</a>
		</div>
	<?php endif; ?>

	<div class="post-card-content">
		<header class="post-card-header">
			<div class="post-card-meta">
				<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
				<?php if ( has_category() ) : ?>
					<span class="meta-sep">&middot;</span>
					<?php the_category( ', ' ); ?>
				<?php endif; ?>
			</div>
			<h2 class="post-card-title">
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</h2>
		</header>

		<div class="post-card-excerpt">
			<?php the_excerpt(); ?>
		</div>

		<a href="<?php the_permalink(); ?>" class="read-more-link">
			<?php esc_html_e( 'Read More', 'better-days' ); ?> <span>&rarr;</span>
		</a>
	</div>
</article>
