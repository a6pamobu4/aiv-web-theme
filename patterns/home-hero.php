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
	<!-- wp:html -->
	<canvas class="aiv-home-hero__canvas" data-hero-canvas aria-hidden="true"></canvas>
	<!-- /wp:html -->

	<!-- wp:group {"align":"wide","className":"aiv-home-hero__inner","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide aiv-home-hero__inner">
		<!-- wp:paragraph {"className":"aiv-section-kicker"} -->
		<p class="aiv-section-kicker"><?php echo esc_html_x( '01 / DIGITAL-АГЕНТСТВО', 'Homepage hero eyebrow', 'aiv-web' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"level":1,"className":"aiv-home-hero__title"} -->
		<h1 class="wp-block-heading aiv-home-hero__title" aria-label="<?php echo esc_attr_x( 'Создаём быстрые сайты для роста бизнеса', 'Homepage hero accessible heading', 'aiv-web' ); ?>">
			<span class="aiv-home-hero__title-line aiv-home-hero__title-line--desktop">
				<?php echo esc_html_x( 'Создаём', 'Homepage hero heading text', 'aiv-web' ); ?>
				<span class="aiv-typewriter" data-typewriter-words="<?php echo esc_attr_x( 'быстрые,продающие,понятные,масштабируемые', 'Homepage hero typewriter words', 'aiv-web' ); ?>" aria-hidden="true">
					<span class="aiv-typewriter__reserve"><?php echo esc_html_x( 'масштабируемые', 'Homepage hero longest typewriter word', 'aiv-web' ); ?></span>
					<span class="aiv-typewriter__text" data-typewriter-text><?php echo esc_html_x( 'быстрые', 'Homepage hero first typewriter word', 'aiv-web' ); ?></span>
				</span>
			</span>
			<span class="aiv-home-hero__title-line aiv-home-hero__title-line--desktop"><?php echo esc_html_x( 'сайты для роста бизнеса', 'Homepage hero heading second line', 'aiv-web' ); ?></span>
			<span class="aiv-home-hero__title-line aiv-home-hero__title-line--mobile"><?php echo esc_html_x( 'Создаём', 'Homepage hero heading mobile first line', 'aiv-web' ); ?></span>
			<span class="aiv-home-hero__title-line aiv-home-hero__title-line--mobile">
				<span class="aiv-typewriter" data-typewriter-words="<?php echo esc_attr_x( 'быстрые,продающие,понятные,масштабируемые', 'Homepage hero typewriter words', 'aiv-web' ); ?>" aria-hidden="true">
					<span class="aiv-typewriter__reserve"><?php echo esc_html_x( 'масштабируемые', 'Homepage hero longest typewriter word', 'aiv-web' ); ?></span>
					<span class="aiv-typewriter__text" data-typewriter-text><?php echo esc_html_x( 'быстрые', 'Homepage hero first typewriter word', 'aiv-web' ); ?></span>
				</span>
				<?php echo esc_html_x( 'сайты', 'Homepage hero heading mobile second line suffix', 'aiv-web' ); ?>
			</span>
			<span class="aiv-home-hero__title-line aiv-home-hero__title-line--mobile"><?php echo esc_html_x( 'для роста бизнеса', 'Homepage hero heading mobile third line', 'aiv-web' ); ?></span>
		</h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"aiv-home-hero__lead"} -->
		<p class="aiv-home-hero__lead"><?php echo esc_html_x( 'Проектируем, запускаем и развиваем сайты с чистой структурой, высокой скоростью и понятной системой управления.', 'Homepage hero lead', 'aiv-web' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:html -->
		<div class="hero-actions"><a href="#contact" class="shine-btn" data-cta="hero-project-start"><span>Обсудить проект<!-- --> &nbsp;<!-- -->→</span></a><a href="#work" class="btn btn-secondary" data-cta="hero-works-anchor"><span class="btn-dot" aria-hidden="true"></span><span>Selected work</span></a></div>
		<!-- /wp:html -->

		<!-- wp:group {"className":"aiv-home-hero__proof","layout":{"type":"grid","minimumColumnWidth":"12rem"}} -->
		<div class="wp-block-group aiv-home-hero__proof">
			<!-- wp:paragraph {"className":"aiv-home-hero__proof-item"} -->
			<p class="aiv-home-hero__proof-item"><strong><?php echo esc_html_x( 'CWV-first', 'Homepage hero proof value', 'aiv-web' ); ?></strong><span><?php echo esc_html_x( 'Подход к скорости', 'Homepage hero proof label', 'aiv-web' ); ?></span></p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"aiv-home-hero__proof-item"} -->
			<p class="aiv-home-hero__proof-item"><strong><?php echo esc_html_x( 'SEO-ready', 'Homepage hero proof value', 'aiv-web' ); ?></strong><span><?php echo esc_html_x( 'Структура сайта', 'Homepage hero proof label', 'aiv-web' ); ?></span></p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"aiv-home-hero__proof-item"} -->
			<p class="aiv-home-hero__proof-item"><strong><?php echo esc_html_x( 'CMS', 'Homepage hero proof value', 'aiv-web' ); ?></strong><span><?php echo esc_html_x( 'Удобное управление', 'Homepage hero proof label', 'aiv-web' ); ?></span></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
