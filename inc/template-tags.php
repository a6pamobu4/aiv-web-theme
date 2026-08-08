<?php
/**
 * Small template helpers.
 *
 * @package AIV_Web
 */

declare( strict_types=1 );

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return a compact post meta string.
 */
function aiv_web_get_post_meta(): string {
	$posted_on = sprintf(
		'<time datetime="%1$s">%2$s</time>',
		esc_attr( get_the_date( DATE_W3C ) ),
		esc_html( get_the_date() )
	);

	$author = sprintf(
		'<span>%s</span>',
		esc_html( get_the_author() )
	);

	return sprintf(
		/* translators: 1: post date, 2: author name. */
		esc_html__( '%1$s by %2$s', 'aiv-web' ),
		$posted_on,
		$author
	);
}

/**
 * Render the site copyright line.
 */
function aiv_web_render_copyright_shortcode(): string {
	return sprintf(
		'<p class="has-small-font-size aiv-site-footer__copyright">%s</p>',
		esc_html(
			sprintf(
				/* translators: %s: current year. */
				__( '© 2014 - %s • AIV-web — сайты, поддержка и продвижение', 'aiv-web' ),
				date_i18n( 'Y' )
			)
		)
	);
}
add_shortcode( 'aiv_web_copyright', 'aiv_web_render_copyright_shortcode' );

/**
 * Render the reusable contact form modal.
 */
function aiv_web_render_contact_modal_shortcode(): string {
	$has_page_form = is_front_page() || is_page( 'services' );

	ob_start();
	?>
	<div class="aiv-contact-modal" data-aiv-contact-modal hidden>
		<div class="aiv-contact-modal__backdrop" data-aiv-contact-modal-close></div>
		<div class="aiv-contact-modal__dialog" role="dialog" aria-modal="true" aria-labelledby="aiv-contact-modal-title">
			<button class="aiv-contact-modal__close" type="button" data-aiv-contact-modal-close aria-label="<?php echo esc_attr_x( 'Закрыть форму', 'Contact modal close label', 'aiv-web' ); ?>">×</button>
			<div class="aiv-contact-modal__header">
				<p class="aiv-section-kicker"><?php echo esc_html_x( 'ОБСУДИТЬ ПРОЕКТ', 'Contact modal label', 'aiv-web' ); ?></p>
				<h2 id="aiv-contact-modal-title" class="aiv-contact-modal__title"><?php echo esc_html_x( 'Расскажите о задаче', 'Contact modal title', 'aiv-web' ); ?></h2>
				<p class="aiv-contact-modal__text"><?php echo esc_html_x( 'Коротко опишите проект — мы оценим формат, сроки и следующий шаг.', 'Contact modal text', 'aiv-web' ); ?></p>
			</div>
			<div class="aiv-contact-modal__form" data-aiv-contact-modal-mount>
				<?php if ( ! $has_page_form ) : ?>
					<div class="aiv-home-contact__form">
						<?php if ( shortcode_exists( 'aiv_contact_form' ) ) : ?>
							<?php
							// The trusted AIV Contact plugin owns form processing and markup.
							// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
							echo do_shortcode( '[aiv_contact_form]' );
							?>
						<?php else : ?>
							<p><?php echo esc_html_x( 'Форма временно недоступна.', 'Missing contact form fallback', 'aiv-web' ); ?></p>
						<?php endif; ?>
					</div>
				<?php endif; ?>
				<p class="aiv-contact-modal__success" data-aiv-contact-modal-success role="status" aria-live="polite"></p>
			</div>
		</div>
	</div>
	<?php
	$output = ob_get_clean();

	return false === $output ? '' : $output;
}
add_shortcode( 'aiv_web_contact_modal', 'aiv_web_render_contact_modal_shortcode' );

/**
 * Render a registered WordPress menu location inside block template parts.
 *
 * @param array<string, string> $atts Shortcode attributes.
 */
function aiv_web_render_menu_shortcode( array $atts ): string {
	$atts = shortcode_atts(
		array(
			'location'    => 'primary',
			'class'       => '',
			'id'          => '',
			'aria_label'  => '',
			'orientation' => 'horizontal',
		),
		$atts,
		'aiv_web_menu'
	);

	$location     = sanitize_key( $atts['location'] );
	$orientation  = 'vertical' === $atts['orientation'] ? 'vertical' : 'horizontal';
	$container_id = sanitize_html_class( $atts['id'] );
	$class_parts  = preg_split( '/\s+/', $atts['class'] );

	if ( false === $class_parts ) {
		$class_parts = array();
	}

	$class_names = implode(
		' ',
		array_filter(
			array_map(
				'sanitize_html_class',
				$class_parts
			)
		)
	);

	if ( ! has_nav_menu( $location ) ) {
		return '';
	}

	return wp_nav_menu(
		array(
			'theme_location'       => $location,
			'container'            => 'nav',
			'container_class'      => $class_names,
			'container_id'         => $container_id,
			'container_aria_label' => $atts['aria_label'] ? esc_attr( $atts['aria_label'] ) : '',
			'menu_class'           => 'aiv-menu aiv-menu--' . $orientation,
			'depth'                => 1,
			'echo'                 => false,
			'fallback_cb'          => '__return_empty_string',
		)
	);
}
add_shortcode( 'aiv_web_menu', 'aiv_web_render_menu_shortcode' );
