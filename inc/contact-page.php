<?php
/**
 * Contact page pattern registration.
 *
 * @package AIV_Web
 */

declare( strict_types=1 );

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register the contact layout explicitly for reliable template resolution.
 */
function aiv_web_register_contact_page_pattern(): void {
	$pattern_name = 'aiv-web/contact-layout';
	$registry     = WP_Block_Patterns_Registry::get_instance();

	if ( $registry->is_registered( $pattern_name ) ) {
		return;
	}

	$pattern_file = get_theme_file_path( 'patterns/page-contact-content.php' );

	if ( ! file_exists( $pattern_file ) ) {
		return;
	}

	ob_start();
	include $pattern_file;
	$content = ob_get_clean();

	if ( false === $content || '' === trim( $content ) ) {
		return;
	}

	register_block_pattern(
		$pattern_name,
		array(
			'title'      => _x( 'Contact page', 'Block pattern title', 'aiv-web' ),
			'categories' => array( 'contact', 'featured' ),
			'content'    => $content,
		)
	);
}
add_action( 'init', 'aiv_web_register_contact_page_pattern', 20 );
