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
<!-- wp:group {"tagName":"section","align":"full","anchor":"process","className":"aiv-home-section aiv-process","layout":{"type":"constrained"}} -->
<section id="process" class="wp-block-group alignfull aiv-home-section aiv-process">
	<!-- wp:group {"align":"wide","className":"aiv-home-section__head","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide aiv-home-section__head">
		<!-- wp:paragraph {"className":"aiv-section-kicker"} -->
		<p class="aiv-section-kicker"><?php echo esc_html_x( '02 / Процесс', 'Process section label', 'aiv-web' ); ?></p>
		<!-- /wp:paragraph -->
		<!-- wp:heading {"className":"aiv-home-section__title"} -->
		<h2 class="wp-block-heading aiv-home-section__title"><?php echo esc_html_x( 'Как двигаемся от задачи к запуску', 'Process heading', 'aiv-web' ); ?></h2>
		<!-- /wp:heading -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","className":"aiv-process-grid","layout":{"type":"grid","minimumColumnWidth":"16rem"}} -->
	<div class="wp-block-group alignwide aiv-process-grid">
		<!-- wp:group {"className":"aiv-process-card","layout":{"type":"constrained"}} -->
		<div class="wp-block-group aiv-process-card">
			<!-- wp:paragraph {"className":"aiv-process-card__index"} --><p class="aiv-process-card__index">01/04</p><!-- /wp:paragraph -->
			<!-- wp:heading {"level":3} --><h3 class="wp-block-heading"><?php echo esc_html_x( 'Брифинг и структура', 'Process step title', 'aiv-web' ); ?></h3><!-- /wp:heading -->
			<!-- wp:paragraph --><p><?php echo esc_html_x( 'Разбираем задачу, аудиторию, конкурентов и собираем структуру будущего сайта.', 'Process step description', 'aiv-web' ); ?></p><!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"aiv-tags"} --><p class="aiv-tags"><span>Брифинг</span><span>Анализ</span><span>Структура</span><span>План работ</span></p><!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"aiv-process-card","layout":{"type":"constrained"}} -->
		<div class="wp-block-group aiv-process-card">
			<!-- wp:paragraph {"className":"aiv-process-card__index"} --><p class="aiv-process-card__index">02/04</p><!-- /wp:paragraph -->
			<!-- wp:heading {"level":3} --><h3 class="wp-block-heading"><?php echo esc_html_x( 'Дизайн и прототип', 'Process step title', 'aiv-web' ); ?></h3><!-- /wp:heading -->
			<!-- wp:paragraph --><p><?php echo esc_html_x( 'Прорабатываем визуальную систему, ключевые блоки, адаптивы и пользовательские сценарии.', 'Process step description', 'aiv-web' ); ?></p><!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"aiv-tags"} --><p class="aiv-tags"><span>UX/UI</span><span>Прототип</span><span>Дизайн-система</span><span>Адаптив</span></p><!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"aiv-process-card","layout":{"type":"constrained"}} -->
		<div class="wp-block-group aiv-process-card">
			<!-- wp:paragraph {"className":"aiv-process-card__index"} --><p class="aiv-process-card__index">03/04</p><!-- /wp:paragraph -->
			<!-- wp:heading {"level":3} --><h3 class="wp-block-heading"><?php echo esc_html_x( 'Разработка сайта', 'Process step title', 'aiv-web' ); ?></h3><!-- /wp:heading -->
			<!-- wp:paragraph --><p><?php echo esc_html_x( 'Собираем лёгкую кастомную тему, подключаем блоки, формы, аналитику и нужные интеграции.', 'Process step description', 'aiv-web' ); ?></p><!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"aiv-tags"} --><p class="aiv-tags"><span>Чистый код</span><span>CMS</span><span>Интеграции</span><span>Performance</span></p><!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"aiv-process-card","layout":{"type":"constrained"}} -->
		<div class="wp-block-group aiv-process-card">
			<!-- wp:paragraph {"className":"aiv-process-card__index"} --><p class="aiv-process-card__index">04/04</p><!-- /wp:paragraph -->
			<!-- wp:heading {"level":3} --><h3 class="wp-block-heading"><?php echo esc_html_x( 'Запуск и развитие', 'Process step title', 'aiv-web' ); ?></h3><!-- /wp:heading -->
			<!-- wp:paragraph --><p><?php echo esc_html_x( 'Проверяем скорость, SEO, аналитику, публикуем сайт и продолжаем развивать его после запуска.', 'Process step description', 'aiv-web' ); ?></p><!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"aiv-tags"} --><p class="aiv-tags"><span>QA</span><span>SEO</span><span>Аналитика</span><span>Поддержка</span></p><!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
