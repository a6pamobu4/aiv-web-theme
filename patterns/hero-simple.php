<?php
/**
 * Title: Simple hero
 * Slug: aiv-web/hero-simple
 * Categories: featured, call-to-action
 * Viewport Width: 1120
 *
 * @package AIV_Web
 */

?>
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"},"blockGap":"var:preset|spacing|50"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide">
	<!-- wp:heading {"level":1,"fontSize":"xx-large"} -->
	<h1 class="wp-block-heading has-xx-large-font-size"><?php echo esc_html_x( 'Clear headline for the page', 'Pattern placeholder heading', 'aiv-web' ); ?></h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"fontSize":"large"} -->
	<p class="has-large-font-size"><?php echo esc_html_x( 'Use this area for a concise value proposition that can be edited for each client website.', 'Pattern placeholder text', 'aiv-web' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons -->
	<div class="wp-block-buttons">
		<!-- wp:button -->
		<div class="wp-block-button"><a class="wp-block-button__link wp-element-button"><?php echo esc_html_x( 'Get started', 'Pattern placeholder button', 'aiv-web' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
