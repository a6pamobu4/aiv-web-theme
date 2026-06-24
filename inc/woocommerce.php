<?php
/**
 * WooCommerce compatibility.
 *
 * @package AIV_Web
 */

declare( strict_types=1 );

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Keep WooCommerce support intentionally small in the starter.
 *
 * Client themes or dedicated performance plugins should own deeper catalog,
 * checkout, and optimization decisions.
 */
function aiv_web_woocommerce_setup(): void {
	add_theme_support(
		'woocommerce',
		array(
			'thumbnail_image_width' => 480,
			'single_image_width'    => 720,
		)
	);
}
add_action( 'after_setup_theme', 'aiv_web_woocommerce_setup' );
