<?php
/**
 * Theme setup.
 *
 * @package AIV_Web
 */

declare( strict_types=1 );

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register theme supports, menus, and image sizes.
 */
function aiv_web_setup(): void {
	load_theme_textdomain( 'aiv-web', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'custom-logo' );
	add_theme_support(
		'html5',
		array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
			'navigation-widgets',
		)
	);

	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary Menu', 'aiv-web' ),
			'footer'  => esc_html__( 'Footer Menu', 'aiv-web' ),
		)
	);

	add_image_size( 'aiv-card', 640, 420, true );
	add_image_size( 'aiv-hero', 1600, 900, true );
}
add_action( 'after_setup_theme', 'aiv_web_setup' );

/**
 * Adds intrinsic dimensions to the SVG custom logo.
 *
 * WordPress cannot derive attachment dimensions from the uploaded SVG, so the
 * browser otherwise reserves no space for the logo before the file loads.
 *
 * @param array<string, string> $attributes Image attributes.
 * @param WP_Post               $attachment Attachment object.
 * @return array<string, string>
 */
function aiv_web_add_custom_logo_dimensions( array $attributes, WP_Post $attachment ): array {
	$custom_logo_id = (int) get_theme_mod( 'custom_logo' );

	if ( $custom_logo_id !== (int) $attachment->ID ) {
		return $attributes;
	}

	if ( empty( $attributes['width'] ) || empty( $attributes['height'] ) ) {
		$attributes['width']  = '1031';
		$attributes['height'] = '150';
	}

	return $attributes;
}
add_filter( 'wp_get_attachment_image_attributes', 'aiv_web_add_custom_logo_dimensions', 10, 2 );
