<?php
/**
 * Title: Home services
 * Slug: aiv-web/home-services
 * Categories: text, columns
 * Viewport Width: 1440
 *
 * @package AIV_Web
 */

?>
<!-- wp:html -->
<section id="services" class="aiv-home-section aiv-services">
	<div class="aiv-home-section__head aiv-services__head">
		<p class="aiv-section-kicker"><?php echo esc_html_x( '03 / УСЛУГИ', 'Services section label', 'aiv-web' ); ?></p>
		<h2 class="aiv-home-section__title"><?php echo esc_html_x( 'Что делаем для роста проекта', 'Services heading', 'aiv-web' ); ?></h2>
	</div>

	<div class="aiv-services__list">
		<a class="aiv-service-row" href="#contact" aria-label="<?php echo esc_attr_x( 'Обсудить разработку сайта', 'Service card action label', 'aiv-web' ); ?>">
			<span class="aiv-service-row__index">01</span>
			<span class="aiv-service-row__arrow" aria-hidden="true">→</span>
			<span class="aiv-service-row__body">
				<span class="aiv-service-row__icon" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><path d="M4 6.5h16v11H4z"/><path d="M8 20h8"/><path d="M12 17.5V20"/></svg></span>
				<h3 class="aiv-service-row__title"><?php echo esc_html_x( 'Разработка сайтов', 'Service title', 'aiv-web' ); ?></h3>
				<span class="aiv-service-row__text"><?php echo esc_html_x( 'Индивидуальные сайты для бизнеса: лендинги, корпоративные сайты, сайты-визитки и e-commerce-проекты с удобным управлением и быстрой загрузкой.', 'Service description', 'aiv-web' ); ?></span>
			</span>
			<span class="aiv-tags aiv-service-row__tags"><span>UX/UI</span><span>SEO-ready</span><span>Performance</span><span>CMS</span></span>
		</a>

		<a class="aiv-service-row" href="#contact" aria-label="<?php echo esc_attr_x( 'Обсудить SEO-продвижение', 'Service card action label', 'aiv-web' ); ?>">
			<span class="aiv-service-row__index">02</span>
			<span class="aiv-service-row__arrow" aria-hidden="true">→</span>
			<span class="aiv-service-row__body">
				<span class="aiv-service-row__icon" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><path d="M4 15.5l4-4 3 3 6-7"/><path d="M17 7.5h3v3"/><path d="M4 19.5h16"/></svg></span>
				<h3 class="aiv-service-row__title"><?php echo esc_html_x( 'SEO-продвижение', 'Service title', 'aiv-web' ); ?></h3>
				<span class="aiv-service-row__text"><?php echo esc_html_x( 'Техническая оптимизация, структура, семантика и работа с контентом для роста видимости в поиске.', 'Service description', 'aiv-web' ); ?></span>
			</span>
			<span class="aiv-tags aiv-service-row__tags"><span>SEO-аудит</span><span>Семантика</span><span>Структура</span><span>Контент</span></span>
		</a>

		<a class="aiv-service-row" href="#contact" aria-label="<?php echo esc_attr_x( 'Обсудить контекстную рекламу', 'Service card action label', 'aiv-web' ); ?>">
			<span class="aiv-service-row__index">03</span>
			<span class="aiv-service-row__arrow" aria-hidden="true">→</span>
			<span class="aiv-service-row__body">
				<span class="aiv-service-row__icon" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><path d="M12 4v16"/><path d="M5 8h14"/><path d="M7 8l3 9"/><path d="M17 8l-3 9"/></svg></span>
				<h3 class="aiv-service-row__title"><?php echo esc_html_x( 'Контекстная реклама', 'Service title', 'aiv-web' ); ?></h3>
				<span class="aiv-service-row__text"><?php echo esc_html_x( 'Подготовка сайта к трафику, настройка рекламных кампаний и аналитика заявок.', 'Service description', 'aiv-web' ); ?></span>
			</span>
			<span class="aiv-tags aiv-service-row__tags"><span>Яндекс Директ</span><span>Google Ads</span><span>Аналитика</span><span>Конверсии</span></span>
		</a>

		<a class="aiv-service-row" href="#contact" aria-label="<?php echo esc_attr_x( 'Обсудить поддержку сайта', 'Service card action label', 'aiv-web' ); ?>">
			<span class="aiv-service-row__index">04</span>
			<span class="aiv-service-row__arrow" aria-hidden="true">→</span>
			<span class="aiv-service-row__body">
				<span class="aiv-service-row__icon" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><path d="M12 4l7 3v5c0 4.5-2.8 7.2-7 8-4.2-.8-7-3.5-7-8V7z"/><path d="M9 12l2 2 4-5"/></svg></span>
				<h3 class="aiv-service-row__title"><?php echo esc_html_x( 'Поддержка и развитие сайта', 'Service title', 'aiv-web' ); ?></h3>
				<span class="aiv-service-row__text"><?php echo esc_html_x( 'Регулярные доработки, обновления, оптимизация скорости, безопасность и развитие проекта.', 'Service description', 'aiv-web' ); ?></span>
			</span>
			<span class="aiv-tags aiv-service-row__tags"><span>Поддержка</span><span>Доработки</span><span>Скорость</span><span>Безопасность</span></span>
		</a>
	</div>
</section>
<!-- /wp:html -->
