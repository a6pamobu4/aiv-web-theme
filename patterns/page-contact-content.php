<?php
/**
 * Title: Contact page
 * Slug: aiv-web/contact-layout
 * Categories: contact, featured
 * Viewport Width: 1440
 *
 * @package AIV_Web
 */

?>
<!-- wp:html -->
<section class="aiv-contact-hero">
	<div class="aiv-contact-hero__inner">
		<div class="aiv-contact-hero__content">
			<p class="aiv-section-kicker"><?php echo esc_html_x( '01 / КОНТАКТЫ', 'Contact page hero label', 'aiv-web' ); ?></p>
			<h1 class="aiv-contact-hero__title"><?php echo esc_html_x( 'Давайте обсудим ваш проект', 'Contact page heading', 'aiv-web' ); ?></h1>
			<p class="aiv-contact-hero__text"><?php echo esc_html_x( 'Расскажите о задаче удобным способом. Ответим, уточним детали и предложим понятный следующий шаг.', 'Contact page introduction', 'aiv-web' ); ?></p>
			<a class="shine-btn" href="#contact"><span><?php echo esc_html_x( 'Заполнить форму', 'Contact page form action', 'aiv-web' ); ?> &nbsp;↓</span></a>
		</div>

		<div class="aiv-contact-channels" aria-label="<?php echo esc_attr_x( 'Способы связи', 'Contact channels label', 'aiv-web' ); ?>">
			<a class="aiv-contact-channel" href="https://t.me/aiv_web" target="_blank" rel="noopener noreferrer">
				<span>Telegram</span>
				<strong>@aiv_web</strong>
				<span aria-hidden="true">→</span>
			</a>
			<a class="aiv-contact-channel" href="mailto:support@aiv-web.ru">
				<span>Email</span>
				<strong>support@aiv-web.ru</strong>
				<span aria-hidden="true">→</span>
			</a>
			<a class="aiv-contact-channel" href="tel:+79131003033">
				<span><?php echo esc_html_x( 'Телефон', 'Contact channel type', 'aiv-web' ); ?></span>
				<strong>+7 913 100-30-33</strong>
				<span aria-hidden="true">→</span>
			</a>
			<a class="aiv-contact-channel" href="https://vk.ru/aiv_web" target="_blank" rel="noopener noreferrer">
				<span>VK</span>
				<strong>vk.ru/aiv_web</strong>
				<span aria-hidden="true">→</span>
			</a>
		</div>
	</div>
</section>

<section id="contact" class="aiv-contact-page__section aiv-contact-form-section">
	<div class="aiv-contact-page__section-head">
		<p class="aiv-section-kicker"><?php echo esc_html_x( '02 / ЗАЯВКА', 'Contact form section label', 'aiv-web' ); ?></p>
		<h2><?php echo esc_html_x( 'Расскажите о задаче', 'Contact form section heading', 'aiv-web' ); ?></h2>
		<p><?php echo esc_html_x( 'Можно описать проект несколькими предложениями. Если каких-то данных пока нет — разберёмся вместе.', 'Contact form section text', 'aiv-web' ); ?></p>
	</div>
	<div class="aiv-home-contact__form aiv-contact-form-section__form" aria-label="<?php echo esc_attr_x( 'Форма заявки', 'Contact form label', 'aiv-web' ); ?>">
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
</section>

<section class="aiv-contact-page__section aiv-contact-next">
	<div class="aiv-contact-page__section-head">
		<p class="aiv-section-kicker"><?php echo esc_html_x( '03 / ЧТО ДАЛЬШЕ', 'Contact next steps label', 'aiv-web' ); ?></p>
		<h2><?php echo esc_html_x( 'Без длинной цепочки согласований', 'Contact next steps heading', 'aiv-web' ); ?></h2>
	</div>
	<ol class="aiv-contact-next__list">
		<li>
			<span>01</span>
			<h3><?php echo esc_html_x( 'Изучим задачу', 'Contact next step title', 'aiv-web' ); ?></h3>
			<p><?php echo esc_html_x( 'Посмотрим вводные, текущий сайт и материалы, если они уже есть.', 'Contact next step text', 'aiv-web' ); ?></p>
		</li>
		<li>
			<span>02</span>
			<h3><?php echo esc_html_x( 'Уточним детали', 'Contact next step title', 'aiv-web' ); ?></h3>
			<p><?php echo esc_html_x( 'Зададим только необходимые вопросы о целях, сроках и ограничениях.', 'Contact next step text', 'aiv-web' ); ?></p>
		</li>
		<li>
			<span>03</span>
			<h3><?php echo esc_html_x( 'Предложим следующий шаг', 'Contact next step title', 'aiv-web' ); ?></h3>
			<p><?php echo esc_html_x( 'Определим формат работы, предварительный бюджет и порядок запуска.', 'Contact next step text', 'aiv-web' ); ?></p>
		</li>
	</ol>
</section>

<section class="aiv-contact-page__section aiv-contact-info">
	<div class="aiv-contact-page__section-head">
		<p class="aiv-section-kicker"><?php echo esc_html_x( '04 / ИНФОРМАЦИЯ', 'Contact information label', 'aiv-web' ); ?></p>
		<h2><?php echo esc_html_x( 'Работаем без привязки к расстоянию', 'Contact information heading', 'aiv-web' ); ?></h2>
	</div>
	<div class="aiv-contact-info__grid">
		<div>
			<span><?php echo esc_html_x( 'Город', 'Contact information type', 'aiv-web' ); ?></span>
			<strong><?php echo esc_html_x( 'Санкт-Петербург', 'Company city', 'aiv-web' ); ?></strong>
			<p><?php echo esc_html_x( 'Работаем с проектами удалённо, поэтому география заказчика не ограничивает процесс.', 'Remote work note', 'aiv-web' ); ?></p>
		</div>
		<div>
			<span><?php echo esc_html_x( 'Ответ', 'Contact information type', 'aiv-web' ); ?></span>
			<strong><?php echo esc_html_x( 'В течение рабочего дня', 'Contact response time', 'aiv-web' ); ?></strong>
			<p><?php echo esc_html_x( 'Если обращение приходит поздно вечером или в выходной, ответим в ближайший рабочий день.', 'Contact response note', 'aiv-web' ); ?></p>
		</div>
		<a class="aiv-contact-info__details" href="<?php echo esc_url( home_url( '/details/' ) ); ?>">
			<span><?php echo esc_html_x( 'Документы', 'Contact information type', 'aiv-web' ); ?></span>
			<strong><?php echo esc_html_x( 'Реквизиты', 'Company details link', 'aiv-web' ); ?></strong>
			<span aria-hidden="true">→</span>
		</a>
	</div>
</section>
<!-- /wp:html -->
