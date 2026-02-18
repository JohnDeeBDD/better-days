<?php
/**
 * Front page defaults for Better Days theme.
 *
 * @package Better_Days
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Get default front page content for Customizer and template fallbacks.
 *
 * @return array<string,mixed>
 */
function better_days_front_page_defaults() {
	return array(
		'hero'         => array(
			'heading'     => 'Better Days for Seniors',
			'text'        => 'Guiding families through full-time care, around-the-clock nursing, and retirement home placement with clarity, compassion, and confidence.',
			'button_text' => 'Book a Care Consultation',
			'button_url'  => '#contact',
			'image'       => '',
		),
		'services'     => array(
			'heading'    => 'Senior Care Placement Services',
			'subheading' => 'Personalized support for every step of the senior care decision process.',
			'items'      => array(
				array(
					'title' => 'Care Needs Assessment',
					'desc'  => 'Evaluate medical, mobility, and daily living needs to determine the right level of full-time support.',
					'icon'  => 'strategy',
				),
				array(
					'title' => 'Retirement Home Matching',
					'desc'  => 'Compare trusted residences and nursing homes based on care level, location, lifestyle, and family preferences.',
					'icon'  => 'planning',
				),
				array(
					'title' => 'Facility Onboarding Support',
					'desc'  => 'Coordinate documentation, move-in timelines, and transition plans to make onboarding smooth and stress-free.',
					'icon'  => 'project',
				),
				array(
					'title' => '24/7 Nursing Care Navigation',
					'desc'  => 'Identify providers and care environments equipped for around-the-clock nursing and health monitoring.',
					'icon'  => 'research',
				),
				array(
					'title' => 'Family Decision Coaching',
					'desc'  => 'Facilitate family conversations and decision-making so everyone understands options, costs, and next steps.',
					'icon'  => 'group',
				),
				array(
					'title' => 'Post-Move Follow Through',
					'desc'  => 'Continue support after placement to ensure care plans are delivered and adjustments happen quickly when needed.',
					'icon'  => 'finance',
				),
			),
		),
		'testimonials' => array(
			'heading' => 'Family Stories',
			'items'   => array(
				array(
					'text' => 'Trish helped us find the right nursing home for my father in less than two weeks. She handled every detail and made a difficult season feel manageable.',
					'name' => 'Angela P.',
					'role' => 'Daughter of Resident',
				),
				array(
					'text' => 'We were overwhelmed by choices, paperwork, and timelines. Better Days for Seniors gave us a clear plan and confidence in every decision.',
					'name' => 'Martin L.',
					'role' => 'Family Care Coordinator',
				),
				array(
					'text' => 'From first call to move-in, the onboarding process was organized and compassionate. Our family finally felt supported.',
					'name' => 'Janet R.',
					'role' => 'Spouse of Client',
				),
			),
		),
		'cta'          => array(
			'heading'     => 'Let\'s Find the Right Care Together',
			'text'        => 'Schedule a one-on-one consultation with Trish Karlinski to plan your loved one\'s next step in full-time care.',
			'button_text' => 'Schedule a Consultation',
			'button_url'  => '#contact',
			'email'       => 'trish@betterdaysforseniors.com',
			'phone'       => '(555) 234-7788',
		),
		'footer'       => array(
			'text' => 'Better Days for Seniors | Senior Care Placement & Onboarding Support',
		),
	);
}
