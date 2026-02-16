<?php


/**
 * Better Days Theme Functions
 *
 * @package Better_Days
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'BETTER_DAYS_VERSION', '1.0.0' );

/**
 * Theme setup.
 */
function better_days_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo', array(
		'height'      => 80,
		'width'       => 250,
		'flex-height' => true,
		'flex-width'  => true,
	) );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	add_theme_support( 'automatic-feed-links' );

	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'better-days' ),
		'footer'  => esc_html__( 'Footer Menu', 'better-days' ),
	) );

	add_image_size( 'better-days-hero', 1920, 800, true );
	add_image_size( 'better-days-service', 600, 400, true );
	add_image_size( 'better-days-logo', 200, 100, true );
}
add_action( 'after_setup_theme', 'better_days_setup' );

/**
 * Enqueue styles and scripts.
 */
function better_days_scripts() {
	// Google Fonts - Open Sans
	wp_enqueue_style(
		'better-days-fonts',
		'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap',
		array(),
		null
	);

	// Main stylesheet
	wp_enqueue_style(
		'better-days-main',
		get_template_directory_uri() . '/assets/css/main.css',
		array( 'better-days-fonts' ),
		BETTER_DAYS_VERSION
	);

	// Theme stylesheet (WordPress requirement)
	wp_enqueue_style(
		'better-days-style',
		get_stylesheet_uri(),
		array( 'better-days-main' ),
		BETTER_DAYS_VERSION
	);

	// Main script
	wp_enqueue_script(
		'better-days-main',
		get_template_directory_uri() . '/assets/js/main.js',
		array(),
		BETTER_DAYS_VERSION,
		true
	);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'better_days_scripts' );

/**
 * Register widget areas.
 */
function better_days_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'better-days' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'better-days' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'better-days' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Footer first column.', 'better-days' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'better-days' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Footer second column.', 'better-days' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'better-days' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Footer third column.', 'better-days' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'better_days_widgets_init' );

/**
 * Customizer settings.
 */
function better_days_customize_register( $wp_customize ) {

	// Hero Section
	$wp_customize->add_section( 'better_days_hero', array(
		'title'    => esc_html__( 'Hero Section', 'better-days' ),
		'priority' => 30,
	) );

	$wp_customize->add_setting( 'better_days_hero_heading', array(
		'default'           => 'We Help Your Business Thrive',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'better_days_hero_heading', array(
		'label'   => esc_html__( 'Hero Heading', 'better-days' ),
		'section' => 'better_days_hero',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'better_days_hero_text', array(
		'default'           => 'From strategy to execution, we partner with you to turn your best ideas into measurable results with proven systems that support sustainable growth.',
		'sanitize_callback' => 'sanitize_textarea_field',
	) );
	$wp_customize->add_control( 'better_days_hero_text', array(
		'label'   => esc_html__( 'Hero Text', 'better-days' ),
		'section' => 'better_days_hero',
		'type'    => 'textarea',
	) );

	$wp_customize->add_setting( 'better_days_hero_button_text', array(
		'default'           => 'Get Started',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'better_days_hero_button_text', array(
		'label'   => esc_html__( 'Hero Button Text', 'better-days' ),
		'section' => 'better_days_hero',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'better_days_hero_button_url', array(
		'default'           => '#contact',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'better_days_hero_button_url', array(
		'label'   => esc_html__( 'Hero Button URL', 'better-days' ),
		'section' => 'better_days_hero',
		'type'    => 'url',
	) );

	$wp_customize->add_setting( 'better_days_hero_image', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'better_days_hero_image', array(
		'label'   => esc_html__( 'Hero Background Image', 'better-days' ),
		'section' => 'better_days_hero',
	) ) );

	// Services Section
	$wp_customize->add_section( 'better_days_services', array(
		'title'    => esc_html__( 'Services Section', 'better-days' ),
		'priority' => 35,
	) );

	$wp_customize->add_setting( 'better_days_services_heading', array(
		'default'           => 'Our Services',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'better_days_services_heading', array(
		'label'   => esc_html__( 'Services Heading', 'better-days' ),
		'section' => 'better_days_services',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'better_days_services_subheading', array(
		'default'           => 'Comprehensive solutions tailored to your business needs.',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'better_days_services_subheading', array(
		'label'   => esc_html__( 'Services Subheading', 'better-days' ),
		'section' => 'better_days_services',
		'type'    => 'text',
	) );

	for ( $i = 1; $i <= 6; $i++ ) {
		$wp_customize->add_setting( "better_days_service_{$i}_title", array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( "better_days_service_{$i}_title", array(
			'label'   => sprintf( esc_html__( 'Service %d Title', 'better-days' ), $i ),
			'section' => 'better_days_services',
			'type'    => 'text',
		) );

		$wp_customize->add_setting( "better_days_service_{$i}_desc", array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_textarea_field',
		) );
		$wp_customize->add_control( "better_days_service_{$i}_desc", array(
			'label'   => sprintf( esc_html__( 'Service %d Description', 'better-days' ), $i ),
			'section' => 'better_days_services',
			'type'    => 'textarea',
		) );

		$wp_customize->add_setting( "better_days_service_{$i}_icon", array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( "better_days_service_{$i}_icon", array(
			'label'       => sprintf( esc_html__( 'Service %d Icon (CSS class or SVG)', 'better-days' ), $i ),
			'section'     => 'better_days_services',
			'type'        => 'text',
			'description' => esc_html__( 'E.g.: strategy, planning, research, interview, group, project', 'better-days' ),
		) );
	}

	// Testimonials Section
	$wp_customize->add_section( 'better_days_testimonials', array(
		'title'    => esc_html__( 'Testimonials Section', 'better-days' ),
		'priority' => 40,
	) );

	$wp_customize->add_setting( 'better_days_testimonials_heading', array(
		'default'           => 'What Our Clients Say',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'better_days_testimonials_heading', array(
		'label'   => esc_html__( 'Testimonials Heading', 'better-days' ),
		'section' => 'better_days_testimonials',
		'type'    => 'text',
	) );

	for ( $i = 1; $i <= 3; $i++ ) {
		$wp_customize->add_setting( "better_days_testimonial_{$i}_text", array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_textarea_field',
		) );
		$wp_customize->add_control( "better_days_testimonial_{$i}_text", array(
			'label'   => sprintf( esc_html__( 'Testimonial %d Text', 'better-days' ), $i ),
			'section' => 'better_days_testimonials',
			'type'    => 'textarea',
		) );

		$wp_customize->add_setting( "better_days_testimonial_{$i}_name", array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( "better_days_testimonial_{$i}_name", array(
			'label'   => sprintf( esc_html__( 'Testimonial %d Name', 'better-days' ), $i ),
			'section' => 'better_days_testimonials',
			'type'    => 'text',
		) );

		$wp_customize->add_setting( "better_days_testimonial_{$i}_role", array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( "better_days_testimonial_{$i}_role", array(
			'label'   => sprintf( esc_html__( 'Testimonial %d Role/Company', 'better-days' ), $i ),
			'section' => 'better_days_testimonials',
			'type'    => 'text',
		) );
	}

	// CTA Section
	$wp_customize->add_section( 'better_days_cta', array(
		'title'    => esc_html__( 'Call to Action Section', 'better-days' ),
		'priority' => 45,
	) );

	$wp_customize->add_setting( 'better_days_cta_heading', array(
		'default'           => "Let's Start a Conversation",
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'better_days_cta_heading', array(
		'label'   => esc_html__( 'CTA Heading', 'better-days' ),
		'section' => 'better_days_cta',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'better_days_cta_text', array(
		'default'           => 'Ready to take your business to the next level? We would love to hear from you.',
		'sanitize_callback' => 'sanitize_textarea_field',
	) );
	$wp_customize->add_control( 'better_days_cta_text', array(
		'label'   => esc_html__( 'CTA Text', 'better-days' ),
		'section' => 'better_days_cta',
		'type'    => 'textarea',
	) );

	$wp_customize->add_setting( 'better_days_cta_button_text', array(
		'default'           => 'Contact Us',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'better_days_cta_button_text', array(
		'label'   => esc_html__( 'CTA Button Text', 'better-days' ),
		'section' => 'better_days_cta',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'better_days_cta_button_url', array(
		'default'           => '/contact',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'better_days_cta_button_url', array(
		'label'   => esc_html__( 'CTA Button URL', 'better-days' ),
		'section' => 'better_days_cta',
		'type'    => 'url',
	) );

	$wp_customize->add_setting( 'better_days_email', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_email',
	) );
	$wp_customize->add_control( 'better_days_email', array(
		'label'   => esc_html__( 'Contact Email', 'better-days' ),
		'section' => 'better_days_cta',
		'type'    => 'email',
	) );

	$wp_customize->add_setting( 'better_days_phone', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'better_days_phone', array(
		'label'   => esc_html__( 'Contact Phone', 'better-days' ),
		'section' => 'better_days_cta',
		'type'    => 'text',
	) );

	// Footer Section
	$wp_customize->add_section( 'better_days_footer', array(
		'title'    => esc_html__( 'Footer Settings', 'better-days' ),
		'priority' => 50,
	) );

	$wp_customize->add_setting( 'better_days_footer_text', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'better_days_footer_text', array(
		'label'   => esc_html__( 'Footer Copyright Text', 'better-days' ),
		'section' => 'better_days_footer',
		'type'    => 'text',
	) );

	// Social Links
	$social_networks = array( 'linkedin', 'facebook', 'twitter', 'instagram' );
	foreach ( $social_networks as $network ) {
		$wp_customize->add_setting( "better_days_social_{$network}", array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		) );
		$wp_customize->add_control( "better_days_social_{$network}", array(
			'label'   => sprintf( esc_html__( '%s URL', 'better-days' ), ucfirst( $network ) ),
			'section' => 'better_days_footer',
			'type'    => 'url',
		) );
	}
}
add_action( 'customize_register', 'better_days_customize_register' );

/**
 * Custom excerpt length.
 */
function better_days_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'better_days_excerpt_length' );

/**
 * Custom excerpt more text.
 */
function better_days_excerpt_more( $more ) {
	return '&hellip;';
}
add_filter( 'excerpt_more', 'better_days_excerpt_more' );
