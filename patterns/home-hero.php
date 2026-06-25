<?php
/**
 * Title: Home hero
 * Slug: aiv-web/home-hero
 * Categories: featured, call-to-action
 * Viewport Width: 1440
 *
 * @package AIV_Web
 */

?>
<!-- wp:group {"tagName":"section","align":"full","className":"aiv-home-hero","layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull aiv-home-hero">
	<!-- wp:group {"align":"wide","className":"aiv-home-hero__inner","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide aiv-home-hero__inner">
		<!-- wp:paragraph {"className":"aiv-section-kicker"} -->
		<p class="aiv-section-kicker"><?php echo esc_html_x( 'Digital-агентство для сайтов, SEO и роста', 'Homepage hero eyebrow', 'aiv-web' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"level":1,"className":"aiv-home-hero__title"} -->
		<h1 class="wp-block-heading aiv-home-hero__title"><?php echo esc_html_x( 'Разрабатываем быстрые сайты, которые помогают бизнесу расти', 'Homepage hero heading', 'aiv-web' ); ?></h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"aiv-home-hero__lead"} -->
		<p class="aiv-home-hero__lead"><?php echo esc_html_x( 'AIV-web проектирует, запускает и развивает сайты с чистой структурой, сильной SEO-базой, удобным управлением и фокусом на заявки.', 'Homepage hero lead', 'aiv-web' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons {"className":"aiv-home-hero__actions"} -->
		<div class="wp-block-buttons aiv-home-hero__actions">
			<!-- wp:button -->
			<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#contact"><?php echo esc_html_x( 'Обсудить проект', 'Homepage hero primary button', 'aiv-web' ); ?></a></div>
			<!-- /wp:button -->

			<!-- wp:button {"className":"is-style-aiv-outline"} -->
			<div class="wp-block-button is-style-aiv-outline"><a class="wp-block-button__link wp-element-button" href="#services"><?php echo esc_html_x( 'Смотреть услуги', 'Homepage hero secondary button', 'aiv-web' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->

		<!-- wp:group {"className":"aiv-home-hero__proof","layout":{"type":"grid","minimumColumnWidth":"12rem"}} -->
		<div class="wp-block-group aiv-home-hero__proof">
			<!-- wp:paragraph -->
			<p><?php echo esc_html_x( 'Быстрая загрузка', 'Homepage hero proof point', 'aiv-web' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph -->
			<p><?php echo esc_html_x( 'SEO-ready структура', 'Homepage hero proof point', 'aiv-web' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph -->
			<p><?php echo esc_html_x( 'Удобное управление контентом', 'Homepage hero proof point', 'aiv-web' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph -->
			<p><?php echo esc_html_x( 'Поддержка после запуска', 'Homepage hero proof point', 'aiv-web' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
