<?php
/**
 * Title: Services hero
 * Slug: aiv-web/services-hero
 * Categories: featured, text
 * Viewport Width: 1440
 *
 * @package AIV_Web
 */

?>
<!-- wp:html -->
<section class="aiv-services-hero">
	<div class="aiv-services-hero__inner">
		<div class="aiv-services-hero__content">
			<p class="aiv-section-kicker"><?php echo esc_html_x( '01 / УСЛУГИ', 'Services page hero label', 'aiv-web' ); ?></p>
			<h1 class="aiv-services-hero__title"><?php echo esc_html_x( 'Решения для роста бизнеса', 'Services page heading', 'aiv-web' ); ?></h1>
			<p class="aiv-services-hero__text"><?php echo esc_html_x( 'Соединяем разработку, SEO, рекламу и поддержку в единую систему, которая помогает привлекать клиентов и расти без технической перегрузки.', 'Services page introduction', 'aiv-web' ); ?></p>
			<div class="hero-actions aiv-services-hero__actions">
				<a class="shine-btn" href="#contact" data-aiv-contact-modal-open><span><?php echo esc_html_x( 'Обсудить проект', 'Services page primary action', 'aiv-web' ); ?> &nbsp;→</span></a>
			</div>
		</div>

		<div class="aiv-services-hero__motion" aria-hidden="true">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
</section>
<!-- /wp:html -->
