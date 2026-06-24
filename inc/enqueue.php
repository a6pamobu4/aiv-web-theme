<?php
/**
 * Frontend assets.
 *
 * @package AIV_Web
 */

declare( strict_types=1 );

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue lightweight frontend styles.
 */
function aiv_web_enqueue_assets(): void {
	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style(
		'aiv-web-style',
		get_theme_file_uri( 'assets/css/base.css' ),
		array(),
		$theme_version
	);
}
add_action( 'wp_enqueue_scripts', 'aiv_web_enqueue_assets' );
