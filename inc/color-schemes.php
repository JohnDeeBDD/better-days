<?php
/**
 * Color Schemes
 *
 * Defines the available color schemes, registers a settings screen under
 * Appearance -> Color Scheme, and exposes the active scheme to the front-end
 * through a body class. The CSS rules themselves live in
 * assets/css/color-schemes.css; this file only handles the wiring.
 *
 * @package Better_Days
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

const BETTER_DAYS_COLOR_SCHEME_OPTION  = 'better_days_color_scheme';
const BETTER_DAYS_COLOR_SCHEME_DEFAULT = 'teal';

/**
 * Return the registered color schemes keyed by slug.
 *
 * Each entry contains a human label, short description, and a small set of
 * representative swatches used to render previews on the settings screen.
 * Adding another scheme here AND a matching `body.color-scheme-<slug>` block
 * in assets/css/color-schemes.css is all that's needed to expose a new option.
 *
 * @return array
 */
function better_days_color_schemes() {
	return array(
		'teal' => array(
			'label'       => __( 'Teal Professional', 'better-days' ),
			'description' => __( 'The original look. Calm teal-blue with a fresh green accent on a clean white header.', 'better-days' ),
			'swatches'    => array(
				'header'  => '#FFFFFF',
				'text'    => '#4A5568',
				'primary' => '#2A9BA0',
				'accent'  => '#65BC7B',
				'dark'    => '#212934',
			),
		),
		'sunset' => array(
			'label'       => __( 'Sunset Coral', 'better-days' ),
			'description' => __( 'Warm coral and amber over a soft cream header. Friendly and energetic.', 'better-days' ),
			'swatches'    => array(
				'header'  => '#FFFAF6',
				'text'    => '#5A4438',
				'primary' => '#E0594E',
				'accent'  => '#F4B860',
				'dark'    => '#2D1B14',
			),
		),
		'indigo' => array(
			'label'       => __( 'Royal Indigo', 'better-days' ),
			'description' => __( 'Refined indigo and lavender for a confident, premium feel.', 'better-days' ),
			'swatches'    => array(
				'header'  => '#FCFAFF',
				'text'    => '#463F66',
				'primary' => '#5B4FBF',
				'accent'  => '#C195F0',
				'dark'    => '#1A1B3A',
			),
		),
		'forest' => array(
			'label'       => __( 'Forest Sage', 'better-days' ),
			'description' => __( 'Grounded forest green with a mustard accent. Earthy and trustworthy.', 'better-days' ),
			'swatches'    => array(
				'header'  => '#F7FAF7',
				'text'    => '#3D4F42',
				'primary' => '#4A7C59',
				'accent'  => '#C4A55A',
				'dark'    => '#1F2A22',
			),
		),
		'midnight' => array(
			'label'       => __( 'Midnight Slate', 'better-days' ),
			'description' => __( 'Dark navigation header with bright blue and coral accents. High-contrast and modern.', 'better-days' ),
			'swatches'    => array(
				'header'  => '#0F1419',
				'text'    => '#FFFFFF',
				'primary' => '#4A90E2',
				'accent'  => '#FF6B6B',
				'dark'    => '#0F1419',
			),
		),
	);
}

/**
 * Return the slug of the currently selected color scheme.
 *
 * Falls back to the default if the stored option is missing or no longer
 * matches a registered scheme.
 *
 * @return string
 */
function better_days_get_active_color_scheme() {
	$stored  = get_option( BETTER_DAYS_COLOR_SCHEME_OPTION, BETTER_DAYS_COLOR_SCHEME_DEFAULT );
	$schemes = better_days_color_schemes();

	return isset( $schemes[ $stored ] ) ? $stored : BETTER_DAYS_COLOR_SCHEME_DEFAULT;
}

/**
 * Sanitize the chosen scheme before storing it.
 *
 * @param string $value Raw value submitted from the settings form.
 * @return string A valid scheme slug.
 */
function better_days_sanitize_color_scheme( $value ) {
	$schemes = better_days_color_schemes();
	$value   = is_string( $value ) ? sanitize_key( $value ) : '';

	return isset( $schemes[ $value ] ) ? $value : BETTER_DAYS_COLOR_SCHEME_DEFAULT;
}

/**
 * Append the active scheme as a body class so color-schemes.css can target it.
 *
 * @param array $classes Existing body classes.
 * @return array
 */
function better_days_color_scheme_body_class( $classes ) {
	$classes[] = 'color-scheme-' . better_days_get_active_color_scheme();
	return $classes;
}
add_filter( 'body_class', 'better_days_color_scheme_body_class' );

/**
 * Register the color scheme option with WordPress settings API.
 */
function better_days_register_color_scheme_setting() {
	register_setting(
		'better_days_color_scheme_group',
		BETTER_DAYS_COLOR_SCHEME_OPTION,
		array(
			'type'              => 'string',
			'sanitize_callback' => 'better_days_sanitize_color_scheme',
			'default'           => BETTER_DAYS_COLOR_SCHEME_DEFAULT,
		)
	);
}
add_action( 'admin_init', 'better_days_register_color_scheme_setting' );

/**
 * Add the Color Scheme submenu under Appearance.
 */
function better_days_register_color_scheme_menu() {
	add_theme_page(
		__( 'Color Scheme', 'better-days' ),
		__( 'Color Scheme', 'better-days' ),
		'manage_options',
		'better-days-color-scheme',
		'better_days_render_color_scheme_page'
	);
}
add_action( 'admin_menu', 'better_days_register_color_scheme_menu' );

/**
 * Enqueue a tiny stylesheet for the settings screen so the previews render.
 *
 * @param string $hook Current admin page hook.
 */
function better_days_color_scheme_admin_assets( $hook ) {
	if ( 'appearance_page_better-days-color-scheme' !== $hook ) {
		return;
	}

	wp_register_style( 'better-days-color-scheme-admin', false, array(), BETTER_DAYS_VERSION );
	wp_enqueue_style( 'better-days-color-scheme-admin' );
	wp_add_inline_style( 'better-days-color-scheme-admin', better_days_color_scheme_admin_css() );
}
add_action( 'admin_enqueue_scripts', 'better_days_color_scheme_admin_assets' );

/**
 * CSS used only on the Color Scheme admin screen.
 */
function better_days_color_scheme_admin_css() {
	return <<<CSS
		.bd-scheme-grid {
			display: grid;
			grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
			gap: 18px;
			margin-top: 20px;
			max-width: 1100px;
		}
		.bd-scheme-card {
			position: relative;
			border: 2px solid #dcdcde;
			border-radius: 10px;
			background: #fff;
			padding: 0;
			overflow: hidden;
			transition: border-color 0.15s ease, box-shadow 0.15s ease, transform 0.15s ease;
		}
		.bd-scheme-card:hover {
			box-shadow: 0 4px 14px rgba(0,0,0,0.08);
			transform: translateY(-1px);
		}
		.bd-scheme-card.is-active {
			border-color: #2271b1;
			box-shadow: 0 0 0 1px #2271b1;
		}
		.bd-scheme-card label {
			display: block;
			cursor: pointer;
		}
		.bd-scheme-card input[type="radio"] {
			position: absolute;
			top: 12px;
			right: 12px;
			z-index: 2;
		}
		.bd-scheme-preview {
			height: 110px;
			position: relative;
		}
		.bd-scheme-preview-nav {
			position: absolute;
			top: 0; left: 0; right: 0;
			height: 38px;
			display: flex;
			align-items: center;
			justify-content: space-between;
			padding: 0 14px;
			border-bottom: 1px solid rgba(0,0,0,0.06);
			font-size: 12px;
			font-weight: 600;
		}
		.bd-scheme-preview-nav-links {
			display: flex;
			gap: 10px;
			opacity: 0.85;
			font-weight: 500;
		}
		.bd-scheme-preview-body {
			position: absolute;
			top: 38px; left: 0; right: 0; bottom: 0;
			display: flex;
			align-items: center;
			justify-content: center;
			gap: 8px;
		}
		.bd-scheme-preview-pill {
			padding: 6px 14px;
			border-radius: 999px;
			color: #fff;
			font-size: 12px;
			font-weight: 600;
		}
		.bd-scheme-preview-dot {
			width: 18px;
			height: 18px;
			border-radius: 50%;
		}
		.bd-scheme-meta {
			padding: 14px 16px 16px;
		}
		.bd-scheme-name {
			font-size: 14px;
			font-weight: 600;
			margin: 0 0 4px;
		}
		.bd-scheme-desc {
			font-size: 12px;
			color: #50575e;
			line-height: 1.5;
			margin: 0 0 10px;
		}
		.bd-swatch-row {
			display: flex;
			gap: 4px;
		}
		.bd-swatch {
			width: 20px;
			height: 20px;
			border-radius: 4px;
			border: 1px solid rgba(0,0,0,0.08);
		}
CSS;
}

/**
 * Render the settings screen.
 */
function better_days_render_color_scheme_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	$schemes = better_days_color_schemes();
	$active  = better_days_get_active_color_scheme();
	?>
	<div class="wrap">
		<h1><?php esc_html_e( 'Color Scheme', 'better-days' ); ?></h1>
		<p>
			<?php esc_html_e( 'Pick a color scheme for the site. The choice mostly drives the navigation header, button colors, links, and section gradients. Save Changes to apply.', 'better-days' ); ?>
		</p>

		<form method="post" action="options.php">
			<?php settings_fields( 'better_days_color_scheme_group' ); ?>

			<div class="bd-scheme-grid">
				<?php foreach ( $schemes as $slug => $scheme ) : ?>
					<?php
					$is_active = ( $slug === $active );
					$swatches  = $scheme['swatches'];
					$nav_text  = ( '#FFFFFF' === strtoupper( $swatches['text'] ) ) ? '#FFFFFF' : $swatches['dark'];
					?>
					<div class="bd-scheme-card<?php echo $is_active ? ' is-active' : ''; ?>">
						<label>
							<input
								type="radio"
								name="<?php echo esc_attr( BETTER_DAYS_COLOR_SCHEME_OPTION ); ?>"
								value="<?php echo esc_attr( $slug ); ?>"
								<?php checked( $is_active ); ?>
							/>
							<div class="bd-scheme-preview" style="background: <?php echo esc_attr( $swatches['header'] ); ?>;">
								<div class="bd-scheme-preview-nav" style="color: <?php echo esc_attr( $nav_text ); ?>;">
									<span><?php esc_html_e( 'Better Days', 'better-days' ); ?></span>
									<span class="bd-scheme-preview-nav-links">
										<span><?php esc_html_e( 'Home', 'better-days' ); ?></span>
										<span style="color: <?php echo esc_attr( $swatches['primary'] ); ?>;"><?php esc_html_e( 'About', 'better-days' ); ?></span>
										<span><?php esc_html_e( 'Contact', 'better-days' ); ?></span>
									</span>
								</div>
								<div class="bd-scheme-preview-body" style="background: linear-gradient(135deg, <?php echo esc_attr( $swatches['dark'] ); ?> 0%, <?php echo esc_attr( $swatches['primary'] ); ?> 100%);">
									<span class="bd-scheme-preview-pill" style="background: <?php echo esc_attr( $swatches['primary'] ); ?>;">
										<?php esc_html_e( 'Get Started', 'better-days' ); ?>
									</span>
									<span class="bd-scheme-preview-dot" style="background: <?php echo esc_attr( $swatches['accent'] ); ?>;"></span>
								</div>
							</div>
							<div class="bd-scheme-meta">
								<p class="bd-scheme-name"><?php echo esc_html( $scheme['label'] ); ?></p>
								<p class="bd-scheme-desc"><?php echo esc_html( $scheme['description'] ); ?></p>
								<div class="bd-swatch-row">
									<?php foreach ( $swatches as $swatch ) : ?>
										<span class="bd-swatch" style="background: <?php echo esc_attr( $swatch ); ?>;"></span>
									<?php endforeach; ?>
								</div>
							</div>
						</label>
					</div>
				<?php endforeach; ?>
			</div>

			<?php submit_button( __( 'Save Changes', 'better-days' ) ); ?>
		</form>
	</div>
	<?php
}
