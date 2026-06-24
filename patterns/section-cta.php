<?php
/**
 * Title: CTA section
 * Slug: aiv-web/section-cta
 * Categories: call-to-action
 * Viewport Width: 1120
 *
 * @package AIV_Web
 */

?>
<!-- wp:group {"align":"wide","backgroundColor":"surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","right":"var:preset|spacing|50","bottom":"var:preset|spacing|70","left":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide has-surface-background-color has-background">
	<!-- wp:heading -->
	<h2 class="wp-block-heading"><?php echo esc_html_x( 'Ready to start?', 'Pattern placeholder heading', 'aiv-web' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p><?php echo esc_html_x( 'Add a clear next step for visitors here.', 'Pattern placeholder text', 'aiv-web' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons -->
	<div class="wp-block-buttons">
		<!-- wp:button -->
		<div class="wp-block-button"><a class="wp-block-button__link wp-element-button"><?php echo esc_html_x( 'Contact us', 'Pattern placeholder button', 'aiv-web' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
