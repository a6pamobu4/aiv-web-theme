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
	$script_assets = array(
		'aiv-web-header-scroll' => array(
			'path' => 'assets/js/header-scroll.js',
			'deps' => array(),
		),
	);

	if ( is_front_page() ) {
		$script_assets['aiv-web-scroll-text']     = array(
			'path' => 'assets/js/scroll-text.js',
			'deps' => array(),
		);
		$script_assets['aiv-web-hero-typewriter'] = array(
			'path' => 'assets/js/hero-typewriter.js',
			'deps' => array(),
		);
		$script_assets['aiv-web-hero-counters']   = array(
			'path' => 'assets/js/hero-counters.js',
			'deps' => array(),
		);
		$script_assets['aiv-web-hero-cat']        = array(
			'path' => 'assets/js/hero-cat.js',
			'deps' => array(),
		);
		$script_assets['aiv-web-process-stack']   = array(
			'path' => 'assets/js/process-stack.js',
			'deps' => array(),
		);
		$script_assets['aiv-web-faq-accordion']   = array(
			'path' => 'assets/js/faq-accordion.js',
			'deps' => array(),
		);
	}

	wp_enqueue_style(
		'aiv-web-style',
		get_theme_file_uri( 'assets/css/base.css' ),
		array(),
		$theme_version
	);

	foreach ( $script_assets as $handle => $script_asset ) {
		$script_file = get_theme_file_path( $script_asset['path'] );

		if ( ! file_exists( $script_file ) ) {
			continue;
		}

		wp_enqueue_script(
			$handle,
			get_theme_file_uri( $script_asset['path'] ),
			$script_asset['deps'],
			(string) filemtime( $script_file ),
			true
		);
		wp_script_add_data( $handle, 'strategy', 'defer' );
	}
}
add_action( 'wp_enqueue_scripts', 'aiv_web_enqueue_assets' );
