<?php
/**
 * Small template helpers.
 *
 * @package AIV_Web
 */

declare( strict_types=1 );

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return a compact post meta string.
 */
function aiv_web_get_post_meta(): string {
	$posted_on = sprintf(
		'<time datetime="%1$s">%2$s</time>',
		esc_attr( get_the_date( DATE_W3C ) ),
		esc_html( get_the_date() )
	);

	$author = sprintf(
		'<span>%s</span>',
		esc_html( get_the_author() )
	);

	return sprintf(
		/* translators: 1: post date, 2: author name. */
		esc_html__( '%1$s by %2$s', 'aiv-web' ),
		$posted_on,
		$author
	);
}
