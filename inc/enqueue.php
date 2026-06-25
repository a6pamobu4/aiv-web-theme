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
	$script_paths  = array(
		'aiv-web-header-scroll' => 'assets/js/header-scroll.js',
		'aiv-web-scroll-text'   => 'assets/js/scroll-text.js',
	);

	wp_enqueue_style(
		'aiv-web-style',
		get_theme_file_uri( 'assets/css/base.css' ),
		array(),
		$theme_version
	);

	foreach ( $script_paths as $handle => $script_path ) {
		$script_file = get_theme_file_path( $script_path );

		if ( ! file_exists( $script_file ) ) {
			continue;
		}

		wp_enqueue_script(
			$handle,
			get_theme_file_uri( $script_path ),
			array(),
			(string) filemtime( $script_file ),
			true
		);
		wp_script_add_data( $handle, 'strategy', 'defer' );
	}
}
add_action( 'wp_enqueue_scripts', 'aiv_web_enqueue_assets' );
