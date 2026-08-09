<?php
/**
 * Title: Service detail contact
 * Slug: aiv-web/service-detail-contact
 * Categories: contact, call-to-action
 * Viewport Width: 1440
 *
 * @package AIV_Web
 */

?>
<!-- wp:html -->
<section id="contact" class="aiv-home-section aiv-home-contact aiv-service-detail-contact">
	<div class="aiv-home-contact__inner">
		<div class="aiv-home-contact__content">
			<p class="aiv-section-kicker"><?php echo esc_html_x( '08 / КОНТАКТ', 'Service detail contact label', 'aiv-web' ); ?></p>
			<h2 class="aiv-home-section__title aiv-home-contact__title"><?php echo esc_html_x( 'Обсудим задачу?', 'Service detail contact heading', 'aiv-web' ); ?></h2>
			<p class="aiv-home-contact__text"><?php echo esc_html_x( 'Расскажите о проекте, текущей ситуации и ожидаемом результате. Предложим подходящий формат и следующий шаг.', 'Service detail contact text', 'aiv-web' ); ?></p>
			<p class="aiv-home-contact__note"><?php echo esc_html_x( 'Обычно отвечаем в течение рабочего дня.', 'Contact response note', 'aiv-web' ); ?></p>
		</div>

		<div class="aiv-home-contact__form" aria-label="<?php echo esc_attr_x( 'Форма заявки', 'Contact form label', 'aiv-web' ); ?>">
			<?php if ( shortcode_exists( 'aiv_contact_form' ) ) : ?>
				<?php
				// The trusted AIV Contact plugin owns all form processing and markup.
				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo do_shortcode( '[aiv_contact_form]' );
				?>
			<?php else : ?>
				<p class="aiv-home-contact__missing"><?php echo esc_html_x( 'Форма временно недоступна.', 'Missing contact form fallback', 'aiv-web' ); ?></p>
			<?php endif; ?>
		</div>
	</div>
</section>
<!-- /wp:html -->
