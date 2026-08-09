<?php
/**
 * Service detail page renderer.
 *
 * @package AIV_Web
 */

declare( strict_types=1 );

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Render a list of short service points.
 *
 * @param array<int, string> $items List items.
 * @param string             $class_name List class.
 */
function aiv_web_render_service_points( array $items, string $class_name ): void {
	?>
	<ul class="<?php echo esc_attr( $class_name ); ?>">
		<?php foreach ( $items as $item ) : ?>
			<li><?php echo esc_html( $item ); ?></li>
		<?php endforeach; ?>
	</ul>
	<?php
}

/**
 * Render a complete service detail page.
 *
 * @param array<string, mixed> $service Service page configuration.
 */
function aiv_web_render_service_detail( array $service ): void {
	?>
	<article class="aiv-service-detail">
		<section class="aiv-service-detail__hero">
			<div class="aiv-service-detail__hero-inner">
				<div class="aiv-service-detail__hero-copy">
					<nav class="aiv-section-kicker aiv-service-detail__breadcrumbs" aria-label="<?php echo esc_attr_x( 'Хлебные крошки', 'Breadcrumb navigation label', 'aiv-web' ); ?>">
						<span>01 /</span>
						<a href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php echo esc_html_x( 'Услуги', 'Services breadcrumb link', 'aiv-web' ); ?></a>
						<span>/ <?php echo esc_html( $service['service_name'] ); ?></span>
					</nav>
					<h1 class="aiv-service-detail__hero-title"><?php echo esc_html( $service['title'] ); ?></h1>
					<p class="aiv-service-detail__hero-text"><?php echo esc_html( $service['intro'] ); ?></p>
					<div class="hero-actions aiv-service-detail__hero-actions">
						<a class="shine-btn" href="#contact" data-aiv-contact-modal-open><span><?php echo esc_html_x( 'Обсудить проект', 'Service page primary action', 'aiv-web' ); ?> &nbsp;→</span></a>
						<a class="btn btn-secondary" href="#pricing"><span><?php echo esc_html_x( 'Стоимость и форматы', 'Service page pricing action', 'aiv-web' ); ?></span></a>
					</div>
				</div>
				<div class="aiv-service-detail__summary" aria-label="<?php echo esc_attr_x( 'Краткая информация об услуге', 'Service summary label', 'aiv-web' ); ?>">
					<?php foreach ( $service['summary'] as $summary_item ) : ?>
						<div class="aiv-service-detail__summary-item">
							<strong><?php echo esc_html( $summary_item['value'] ); ?></strong>
							<span><?php echo esc_html( $summary_item['label'] ); ?></span>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</section>

		<section class="aiv-service-detail__section aiv-service-detail__outcomes">
			<div class="aiv-service-detail__section-head">
				<p class="aiv-section-kicker"><?php echo esc_html_x( '02 / РЕЗУЛЬТАТ', 'Service outcomes label', 'aiv-web' ); ?></p>
				<h2><?php echo esc_html( $service['outcomes_title'] ); ?></h2>
			</div>
			<div class="aiv-service-detail__outcome-grid">
				<?php foreach ( $service['outcomes'] as $index => $outcome ) : ?>
					<div class="aiv-service-detail__outcome">
						<span><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span>
						<h3><?php echo esc_html( $outcome['title'] ); ?></h3>
						<p><?php echo esc_html( $outcome['text'] ); ?></p>
					</div>
				<?php endforeach; ?>
			</div>
		</section>

		<section class="aiv-service-detail__section aiv-service-detail__scope">
			<div class="aiv-service-detail__section-head">
				<p class="aiv-section-kicker"><?php echo esc_html_x( '03 / СОСТАВ РАБОТ', 'Service scope label', 'aiv-web' ); ?></p>
				<h2><?php echo esc_html( $service['scope_title'] ); ?></h2>
			</div>
			<?php aiv_web_render_service_points( $service['scope'], 'aiv-service-detail__scope-list' ); ?>
		</section>

		<section class="aiv-service-detail__section aiv-service-detail__workflow">
			<div class="aiv-service-detail__section-head">
				<p class="aiv-section-kicker"><?php echo esc_html_x( '04 / ФОРМАТ РАБОТЫ', 'Service workflow label', 'aiv-web' ); ?></p>
				<h2><?php echo esc_html( $service['workflow_title'] ); ?></h2>
			</div>
			<ol class="aiv-service-detail__workflow-list">
				<?php foreach ( $service['workflow'] as $index => $step ) : ?>
					<li>
						<span><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span>
						<h3><?php echo esc_html( $step['title'] ); ?></h3>
						<p><?php echo esc_html( $step['text'] ); ?></p>
					</li>
				<?php endforeach; ?>
			</ol>
		</section>

		<section id="pricing" class="aiv-service-detail__section aiv-service-detail__pricing">
			<div class="aiv-service-detail__section-head">
				<p class="aiv-section-kicker"><?php echo esc_html_x( '05 / СТОИМОСТЬ', 'Service pricing label', 'aiv-web' ); ?></p>
				<h2><?php echo esc_html( $service['pricing_title'] ); ?></h2>
				<p><?php echo esc_html( $service['pricing_intro'] ); ?></p>
			</div>
			<div class="aiv-service-detail__pricing-grid">
				<?php foreach ( $service['prices'] as $price ) : ?>
					<div class="aiv-service-detail__price">
						<div class="aiv-service-detail__price-head">
							<h3><?php echo esc_html( $price['title'] ); ?></h3>
							<strong><?php echo esc_html( $price['price'] ); ?></strong>
							<?php if ( ! empty( $price['term'] ) ) : ?>
								<span><?php echo esc_html( $price['term'] ); ?></span>
							<?php endif; ?>
						</div>
						<?php aiv_web_render_service_points( $price['features'], 'aiv-service-detail__price-features' ); ?>
					</div>
				<?php endforeach; ?>
			</div>
			<?php foreach ( $service['pricing_notes'] as $note ) : ?>
				<p class="aiv-service-detail__pricing-note"><?php echo esc_html( $note ); ?></p>
			<?php endforeach; ?>
		</section>

		<section class="aiv-service-detail__section aiv-service-detail__faq">
			<div class="aiv-service-detail__section-head">
				<p class="aiv-section-kicker"><?php echo esc_html_x( '06 / FAQ', 'Service FAQ label', 'aiv-web' ); ?></p>
				<h2><?php echo esc_html_x( 'Что важно знать до старта', 'Service FAQ heading', 'aiv-web' ); ?></h2>
			</div>
			<div class="aiv-faq-list">
				<?php foreach ( $service['faq'] as $index => $faq ) : ?>
					<details class="aiv-faq-item" data-faq-item>
						<summary><?php echo esc_html( sprintf( '%02d. %s', $index + 1, $faq['question'] ) ); ?></summary>
						<div class="aiv-faq-item__content"><p><?php echo esc_html( $faq['answer'] ); ?></p></div>
					</details>
				<?php endforeach; ?>
			</div>
		</section>

		<section class="aiv-service-detail__section aiv-service-detail__related">
			<div class="aiv-service-detail__section-head">
				<p class="aiv-section-kicker"><?php echo esc_html_x( '07 / СВЯЗАННЫЕ УСЛУГИ', 'Related services label', 'aiv-web' ); ?></p>
				<h2><?php echo esc_html_x( 'Усиливаем результат комплексно', 'Related services heading', 'aiv-web' ); ?></h2>
			</div>
			<div class="aiv-service-detail__related-list">
				<?php foreach ( $service['related'] as $related ) : ?>
					<a href="<?php echo esc_url( home_url( $related['url'] ) ); ?>">
						<span><?php echo esc_html( $related['title'] ); ?></span>
						<span aria-hidden="true">→</span>
					</a>
				<?php endforeach; ?>
			</div>
		</section>
	</article>
	<?php
}
