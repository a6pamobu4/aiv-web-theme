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

/**
 * Render the site copyright line.
 */
function aiv_web_render_copyright_shortcode(): string {
	return sprintf(
		'<p class="has-small-font-size aiv-site-footer__copyright">%s</p>',
		esc_html(
			sprintf(
				/* translators: %s: current year. */
				__( '© 2014 - %s • AIV-web — сайты, поддержка и продвижение', 'aiv-web' ),
				date_i18n( 'Y' )
			)
		)
	);
}
add_shortcode( 'aiv_web_copyright', 'aiv_web_render_copyright_shortcode' );

/**
 * Render a registered WordPress menu location inside block template parts.
 *
 * @param array<string, string> $atts Shortcode attributes.
 */
function aiv_web_render_menu_shortcode( array $atts ): string {
	$atts = shortcode_atts(
		array(
			'location'    => 'primary',
			'class'       => '',
			'aria_label'  => '',
			'orientation' => 'horizontal',
		),
		$atts,
		'aiv_web_menu'
	);

	$location    = sanitize_key( $atts['location'] );
	$orientation = 'vertical' === $atts['orientation'] ? 'vertical' : 'horizontal';
	$class_parts = preg_split( '/\s+/', $atts['class'] );

	if ( false === $class_parts ) {
		$class_parts = array();
	}

	$class_names = implode(
		' ',
		array_filter(
			array_map(
				'sanitize_html_class',
				$class_parts
			)
		)
	);

	if ( ! has_nav_menu( $location ) ) {
		return '';
	}

	return wp_nav_menu(
		array(
			'theme_location'       => $location,
			'container'            => 'nav',
			'container_class'      => $class_names,
			'container_aria_label' => $atts['aria_label'] ? esc_attr( $atts['aria_label'] ) : '',
			'menu_class'           => 'aiv-menu aiv-menu--' . $orientation,
			'depth'                => 1,
			'echo'                 => false,
			'fallback_cb'          => '__return_empty_string',
		)
	);
}
add_shortcode( 'aiv_web_menu', 'aiv_web_render_menu_shortcode' );
