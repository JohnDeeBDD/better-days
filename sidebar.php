<?php
/**
 * Sidebar Template
 *
 * @package Better_Days
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="sidebar" aria-label="<?php esc_attr_e( 'Sidebar', 'better-days' ); ?>">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>
