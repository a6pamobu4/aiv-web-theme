<?php
/**
 * Title: Home process
 * Slug: aiv-web/home-process
 * Categories: text, columns
 * Viewport Width: 1440
 *
 * @package AIV_Web
 */

?>
<!-- wp:html -->
<section id="process" class="aiv-home-section aiv-process">
	<div class="aiv-home-section__head aiv-process__head">
		<p class="aiv-section-kicker"><?php echo esc_html_x( '04 / ПРОЦЕСС', 'Process section label', 'aiv-web' ); ?></p>
		<h2 class="aiv-home-section__title"><?php echo esc_html_x( 'Как двигаемся от задачи к запуску', 'Process heading', 'aiv-web' ); ?></h2>
	</div>

	<div class="aiv-process-stack" data-process-stack>
		<article class="aiv-process-card" style="--process-index: 1;">
			<span class="aiv-process-card__index">01</span>
			<div class="aiv-process-card__body">
				<span class="aiv-process-card__icon" aria-hidden="true">
					<svg viewBox="0 0 24 24"><path d="M5 5h14v10H8l-3 3V5Z"/><path d="M9 9h6"/><path d="M9 12h4"/></svg>
				</span>
				<h3><?php echo esc_html_x( 'Брифинг и структура', 'Process step title', 'aiv-web' ); ?></h3>
				<p><?php echo esc_html_x( 'Разбираем задачу, аудиторию, конкурентов и собираем структуру будущего сайта.', 'Process step description', 'aiv-web' ); ?></p>
			</div>
			<p class="aiv-tags aiv-process-card__tags"><span>Брифинг</span><span>Анализ</span><span>Структура</span><span>План работ</span></p>
		</article>

		<article class="aiv-process-card" style="--process-index: 2;">
			<span class="aiv-process-card__index">02</span>
			<div class="aiv-process-card__body">
				<span class="aiv-process-card__icon" aria-hidden="true">
					<svg viewBox="0 0 24 24"><path d="M4 20h16"/><path d="m6 16 8.5-8.5 2 2L8 18H6v-2Z"/><path d="m14 6 2-2 2 2-2 2"/></svg>
				</span>
				<h3><?php echo esc_html_x( 'Дизайн и прототип', 'Process step title', 'aiv-web' ); ?></h3>
				<p><?php echo esc_html_x( 'Прорабатываем визуальную систему, ключевые блоки, адаптивы и пользовательские сценарии.', 'Process step description', 'aiv-web' ); ?></p>
			</div>
			<p class="aiv-tags aiv-process-card__tags"><span>UX/UI</span><span>Прототип</span><span>Дизайн-система</span><span>Адаптив</span></p>
		</article>

		<article class="aiv-process-card" style="--process-index: 3;">
			<span class="aiv-process-card__index">03</span>
			<div class="aiv-process-card__body">
				<span class="aiv-process-card__icon" aria-hidden="true">
					<svg viewBox="0 0 24 24"><path d="m8 9-4 3 4 3"/><path d="m16 9 4 3-4 3"/><path d="m14 5-4 14"/></svg>
				</span>
				<h3><?php echo esc_html_x( 'Разработка сайта', 'Process step title', 'aiv-web' ); ?></h3>
				<p><?php echo esc_html_x( 'Собираем лёгкую кастомную тему, подключаем блоки, формы, аналитику и нужные интеграции.', 'Process step description', 'aiv-web' ); ?></p>
			</div>
			<p class="aiv-tags aiv-process-card__tags"><span>Чистый код</span><span>CMS</span><span>Интеграции</span><span>Performance</span></p>
		</article>

		<article class="aiv-process-card" style="--process-index: 4;">
			<span class="aiv-process-card__index">04</span>
			<div class="aiv-process-card__body">
				<span class="aiv-process-card__icon" aria-hidden="true">
					<svg viewBox="0 0 24 24"><path d="M12 3v4"/><path d="M5.6 5.6 8.4 8.4"/><path d="M3 12h4"/><path d="m5.6 18.4 2.8-2.8"/><path d="M12 17v4"/><path d="m15.6 15.6 2.8 2.8"/><path d="M17 12h4"/><path d="m15.6 8.4 2.8-2.8"/></svg>
				</span>
				<h3><?php echo esc_html_x( 'Запуск и развитие', 'Process step title', 'aiv-web' ); ?></h3>
				<p><?php echo esc_html_x( 'Проверяем скорость, SEO, аналитику, публикуем сайт и продолжаем развивать его после запуска.', 'Process step description', 'aiv-web' ); ?></p>
			</div>
			<p class="aiv-tags aiv-process-card__tags"><span>QA</span><span>SEO</span><span>Аналитика</span><span>Поддержка</span></p>
		</article>
	</div>
</section>
<!-- /wp:html -->
