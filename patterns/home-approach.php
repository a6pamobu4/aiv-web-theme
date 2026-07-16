<?php
/**
 * Title: Home approach
 * Slug: aiv-web/home-approach
 * Categories: featured
 * Viewport Width: 1440
 *
 * @package AIV_Web
 */

?>
<!-- wp:group {"tagName":"section","align":"full","className":"aiv-approach","layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull aiv-approach" data-approach-timeline>
	<!-- wp:html -->
	<div class="aiv-approach-sticky">
		<div class="aiv-approach__inner">
			<div class="aiv-approach-intro">
				<p class="aiv-section-kicker"><?php echo esc_html_x( '02 / ПОДХОД', 'Homepage approach eyebrow', 'aiv-web' ); ?></p>
				<h2 class="aiv-home-section__title aiv-approach__title"><?php echo esc_html_x( 'Сайт — не набор экранов. Это рабочая система для бизнеса.', 'Homepage approach title', 'aiv-web' ); ?></h2>
			</div>

			<div class="aiv-approach-timeline" aria-label="<?php echo esc_attr_x( 'Принципы подхода AIV-web', 'Homepage approach timeline label', 'aiv-web' ); ?>">
				<div class="aiv-approach-line" aria-hidden="true">
					<span class="aiv-approach-progress"></span>
				</div>
				<div class="aiv-approach-background-number" data-approach-background-number aria-hidden="true">01</div>

				<div class="aiv-approach-item is-active" data-approach-item data-approach-number="01">
					<span class="aiv-approach-marker" aria-hidden="true"></span>
					<p class="aiv-approach-number"><?php echo esc_html_x( '01', 'Homepage approach principle number', 'aiv-web' ); ?></p>
					<h3 class="aiv-approach-title"><?php echo esc_html_x( 'Сначала задача — потом визуал', 'Homepage approach principle title', 'aiv-web' ); ?></h3>
					<p class="aiv-approach-text"><?php echo esc_html_x( 'Разбираемся в продукте, аудитории и целях проекта. Каждый экран должен вести пользователя к понятному действию.', 'Homepage approach principle text', 'aiv-web' ); ?></p>
				</div>

				<div class="aiv-approach-item" data-approach-item data-approach-number="02">
					<span class="aiv-approach-marker" aria-hidden="true"></span>
					<p class="aiv-approach-number"><?php echo esc_html_x( '02', 'Homepage approach principle number', 'aiv-web' ); ?></p>
					<h3 class="aiv-approach-title"><?php echo esc_html_x( 'Простота вместо перегруза', 'Homepage approach principle title', 'aiv-web' ); ?></h3>
					<p class="aiv-approach-text"><?php echo esc_html_x( 'Не добавляем функции и эффекты ради количества. Оставляем только то, что помогает пользоваться сайтом и развивать его.', 'Homepage approach principle text', 'aiv-web' ); ?></p>
				</div>

				<div class="aiv-approach-item" data-approach-item data-approach-number="03">
					<span class="aiv-approach-marker" aria-hidden="true"></span>
					<p class="aiv-approach-number"><?php echo esc_html_x( '03', 'Homepage approach principle number', 'aiv-web' ); ?></p>
					<h3 class="aiv-approach-title"><?php echo esc_html_x( 'Готовность к росту с первого дня', 'Homepage approach principle title', 'aiv-web' ); ?></h3>
					<p class="aiv-approach-text"><?php echo esc_html_x( 'Закладываем скорость, SEO-структуру, аналитику и возможности масштабирования ещё до запуска.', 'Homepage approach principle text', 'aiv-web' ); ?></p>
				</div>

				<div class="aiv-approach-item" data-approach-item data-approach-number="04">
					<span class="aiv-approach-marker" aria-hidden="true"></span>
					<p class="aiv-approach-number"><?php echo esc_html_x( '04', 'Homepage approach principle number', 'aiv-web' ); ?></p>
					<h3 class="aiv-approach-title"><?php echo esc_html_x( 'Развитие после запуска', 'Homepage approach principle title', 'aiv-web' ); ?></h3>
					<p class="aiv-approach-text"><?php echo esc_html_x( 'Анализируем результаты, оптимизируем сайт и добавляем новые возможности вместе с ростом бизнеса.', 'Homepage approach principle text', 'aiv-web' ); ?></p>
				</div>
			</div>
		</div>
	</div>
	<!-- /wp:html -->
</section>
<!-- /wp:group -->
