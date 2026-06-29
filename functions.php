<?php
/**
 * AIV-web functions and definitions.
 *
 * @package AIV_Web
 */

declare( strict_types=1 );

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$aiv_web_includes = array(
	'inc/setup.php',
	'inc/enqueue.php',
	'inc/editor.php',
	'inc/uploads.php',
	'inc/template-tags.php',
	'inc/woocommerce.php',
);

foreach ( $aiv_web_includes as $aiv_web_file ) {
	require_once get_theme_file_path( $aiv_web_file );
}
