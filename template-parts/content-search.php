<?php
/**
 * Template Part: Search Result Content
 *
 * @package Better_Days
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card search-result' ); ?>>
	<div class="post-card-content">
		<header class="post-card-header">
			<div class="post-card-meta">
				<span class="post-type-label"><?php echo esc_html( get_post_type_object( get_post_type() )->labels->singular_name ); ?></span>
				<span class="meta-sep">&middot;</span>
				<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
			</div>
			<h2 class="post-card-title">
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</h2>
		</header>

		<div class="post-card-excerpt">
			<?php the_excerpt(); ?>
		</div>

		<a href="<?php the_permalink(); ?>" class="read-more-link">
			<?php esc_html_e( 'View', 'better-days' ); ?> <span>&rarr;</span>
		</a>
	</div>
</article>
