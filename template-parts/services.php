<?php
/**
 * Template Part: Services Section
 *
 * @package Better_Days
 */

$heading    = get_theme_mod( 'better_days_services_heading', 'Our Services' );
$subheading = get_theme_mod( 'better_days_services_subheading', 'Comprehensive solutions tailored to your business needs.' );

$default_services = array(
	array(
		'title' => 'Strategic Planning',
		'desc'  => 'Develop clear roadmaps that align your team and resources toward achieving your most important business goals.',
		'icon'  => 'strategy',
	),
	array(
		'title' => 'Business Advisory',
		'desc'  => 'Expert guidance on operational efficiency, financial management, and organizational growth strategies.',
		'icon'  => 'planning',
	),
	array(
		'title' => 'Bookkeeping & Finance',
		'desc'  => 'Reliable financial systems that bring clarity and confidence to your business decisions.',
		'icon'  => 'finance',
	),
	array(
		'title' => 'Market Research',
		'desc'  => 'Data-driven insights to help you understand your market, customers, and competitive landscape.',
		'icon'  => 'research',
	),
	array(
		'title' => 'HR & Team Building',
		'desc'  => 'Build and support high-performing teams with effective human resource practices and policies.',
		'icon'  => 'group',
	),
	array(
		'title' => 'Project Management',
		'desc'  => 'Turn ideas into reality with structured, proven project management methodologies.',
		'icon'  => 'project',
	),
);

$services = array();
for ( $i = 1; $i <= 6; $i++ ) {
	$title = get_theme_mod( "better_days_service_{$i}_title" );
	$desc  = get_theme_mod( "better_days_service_{$i}_desc" );
	$icon  = get_theme_mod( "better_days_service_{$i}_icon" );

	if ( $title && $desc ) {
		$services[] = array(
			'title' => $title,
			'desc'  => $desc,
			'icon'  => $icon ? $icon : 'default',
		);
	}
}

if ( empty( $services ) ) {
	$services = $default_services;
}

$icon_svgs = array(
	'strategy' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="2"><circle cx="24" cy="24" r="20"/><path d="M24 14v10l7 7"/></svg>',
	'planning' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="2"><rect x="8" y="6" width="32" height="36" rx="2"/><line x1="16" y1="16" x2="32" y2="16"/><line x1="16" y1="24" x2="32" y2="24"/><line x1="16" y1="32" x2="26" y2="32"/></svg>',
	'finance'  => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 38l10-12 8 6 10-14 8 8"/><line x1="6" y1="6" x2="6" y2="42"/><line x1="6" y1="42" x2="42" y2="42"/></svg>',
	'research' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="2"><circle cx="20" cy="20" r="14"/><line x1="30" y1="30" x2="42" y2="42"/></svg>',
	'group'    => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="2"><circle cx="24" cy="14" r="8"/><path d="M8 40c0-8.837 7.163-16 16-16s16 7.163 16 16"/></svg>',
	'project'  => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="2"><rect x="6" y="6" width="36" height="36" rx="4"/><polyline points="14,24 20,30 34,18"/></svg>',
	'default'  => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="2"><polygon points="24,4 44,18 38,42 10,42 4,18"/></svg>',
);
?>

<section class="services-section" id="services">
	<div class="container">
		<div class="section-header animate-fade-up">
			<h2 class="section-title"><?php echo esc_html( $heading ); ?></h2>
			<p class="section-subtitle"><?php echo esc_html( $subheading ); ?></p>
		</div>

		<div class="services-grid">
			<?php foreach ( $services as $index => $service ) : ?>
				<div class="service-card animate-fade-up" style="animation-delay: <?php echo esc_attr( $index * 0.1 ); ?>s;">
					<div class="service-icon">
						<?php
						$icon_key = isset( $service['icon'] ) ? $service['icon'] : 'default';
						if ( isset( $icon_svgs[ $icon_key ] ) ) {
							echo $icon_svgs[ $icon_key ];
						} else {
							echo $icon_svgs['default'];
						}
						?>
					</div>
					<h3 class="service-title"><?php echo esc_html( $service['title'] ); ?></h3>
					<p class="service-desc"><?php echo esc_html( $service['desc'] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
