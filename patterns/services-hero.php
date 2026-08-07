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
				<a class="shine-btn" href="#contact"><span><?php echo esc_html_x( 'Обсудить проект', 'Services page primary action', 'aiv-web' ); ?> &nbsp;→</span></a>
				<a class="shine-btn" href="#services-list"><span><span class="btn-dot" aria-hidden="true"></span><?php echo esc_html_x( 'Наши услуги', 'Services page secondary action', 'aiv-web' ); ?></span></a>
			</div>
		</div>

		<figure class="aiv-services-hero__visual" aria-hidden="true">
			<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/services-hero-visual.jpg' ) ); ?>" alt="" width="800" height="1200" fetchpriority="high" decoding="async" />
		</figure>
	</div>
</section>
<!-- /wp:html -->
