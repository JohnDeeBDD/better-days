<?php
/**
 * 404 Template
 *
 * @package Better_Days
 */

get_header();
?>

<div class="page-hero">
	<div class="container">
		<h1 class="page-hero-title"><?php esc_html_e( 'Page Not Found', 'better-days' ); ?></h1>
	</div>
</div>

<div class="container content-area">
	<div class="content-wrapper">
		<div class="primary-content error-404">
			<div class="error-content">
				<span class="error-code">404</span>
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Try searching for what you need.', 'better-days' ); ?></p>
				<?php get_search_form(); ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary">
					<?php esc_html_e( 'Back to Home', 'better-days' ); ?>
				</a>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();
