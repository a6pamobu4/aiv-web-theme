<?php
/**
 * Title: Home final CTA
 * Slug: aiv-web/home-cta
 * Categories: call-to-action
 * Viewport Width: 1440
 *
 * @package AIV_Web
 */

?>
<!-- wp:group {"tagName":"section","align":"full","anchor":"contact","className":"aiv-final-cta","layout":{"type":"constrained"}} -->
<section id="contact" class="wp-block-group alignfull aiv-final-cta">
	<!-- wp:group {"align":"wide","className":"aiv-final-cta__inner","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide aiv-final-cta__inner">
		<!-- wp:paragraph {"className":"aiv-section-kicker"} -->
		<p class="aiv-section-kicker"><?php echo esc_html_x( '04 / Контакт', 'Final CTA section label', 'aiv-web' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"className":"aiv-final-cta__title"} -->
		<h2 class="wp-block-heading aiv-final-cta__title"><?php echo esc_html_x( 'Нужен сайт, который можно развивать, а не переделывать через полгода?', 'Final CTA heading', 'aiv-web' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"aiv-final-cta__text"} -->
		<p class="aiv-final-cta__text"><?php echo esc_html_x( 'Расскажите о задаче, и мы предложим понятный план: структуру, этапы, сроки и решения, которые помогут сайту быстрее запуститься и приносить бизнесу пользу.', 'Final CTA text', 'aiv-web' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button -->
			<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#telegram-todo"><?php echo esc_html_x( 'Обсудить проект', 'Final CTA button', 'aiv-web' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
