<?php
/**
 * Upload type support.
 *
 * @package AIV_Web
 */

declare( strict_types=1 );

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Allow project image formats in the media library.
 *
 * SVG uploads are limited to users with unfiltered HTML capability because SVG
 * can contain executable markup.
 *
 * @param array<string, string> $mimes Allowed mime types keyed by extension.
 * @return array<string, string>
 */
function aiv_web_upload_mimes( array $mimes ): array {
	$mimes['webp'] = 'image/webp';

	if ( current_user_can( 'unfiltered_html' ) ) {
		$mimes['svg'] = 'image/svg+xml';
	}

	return $mimes;
}
add_filter( 'upload_mimes', 'aiv_web_upload_mimes' );

/**
 * Make WordPress filetype checks accept SVG for trusted users.
 *
 * @param array<string, string|false> $filetype_ext Filetype check result.
 * @param string                      $file         Full path to the uploaded file.
 * @param string                      $filename     Uploaded file name.
 * @return array<string, string|false>
 */
function aiv_web_check_svg_filetype( array $filetype_ext, string $file, string $filename ): array {
	unset( $file );

	if ( ! current_user_can( 'unfiltered_html' ) ) {
		return $filetype_ext;
	}

	$extension = strtolower( (string) pathinfo( $filename, PATHINFO_EXTENSION ) );

	if ( 'svg' !== $extension ) {
		return $filetype_ext;
	}

	$filetype_ext['ext']  = 'svg';
	$filetype_ext['type'] = 'image/svg+xml';

	return $filetype_ext;
}
add_filter( 'wp_check_filetype_and_ext', 'aiv_web_check_svg_filetype', 10, 3 );
