<?php
/**
 * Ready-made solutions catalog.
 *
 * @package AIV_Web
 */

declare( strict_types=1 );

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/** Register the admin-managed solution catalog. */
function aiv_web_register_solutions(): void {
	register_post_type(
		'aiv_solution',
		array(
			'labels'              => array(
				'name'               => __( 'Готовые решения', 'aiv-web' ),
				'singular_name'      => __( 'Готовое решение', 'aiv-web' ),
				'add_new_item'       => __( 'Добавить решение', 'aiv-web' ),
				'edit_item'          => __( 'Редактировать решение', 'aiv-web' ),
				'featured_image'     => __( 'Превью решения', 'aiv-web' ),
				'set_featured_image' => __( 'Задать превью решения', 'aiv-web' ),
			),
			'public'              => false,
			'show_ui'             => true,
			'show_in_rest'        => true,
			'menu_icon'           => 'dashicons-layout',
			'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes', 'custom-fields' ),
			'exclude_from_search' => true,
		),
	);

	register_taxonomy(
		'aiv_solution_category',
		'aiv_solution',
		array(
			'labels'            => array(
				'name'          => __( 'Категории решений', 'aiv-web' ),
				'singular_name' => __( 'Категория решения', 'aiv-web' ),
			),
			'hierarchical'      => true,
			'public'            => false,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_rest'      => true,
		),
	);
}
add_action( 'init', 'aiv_web_register_solutions' );

/** Add a simple demo URL field to the solution editor. */
function aiv_web_solution_meta_box(): void {
	add_meta_box( 'aiv-solution-demo', __( 'Демо и стоимость', 'aiv-web' ), 'aiv_web_solution_demo_field', 'aiv_solution', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'aiv_web_solution_meta_box' );

/**
 * Render the demo URL field.
 *
 * @param WP_Post $post Solution being edited.
 */
function aiv_web_solution_demo_field( WP_Post $post ): void {
	wp_nonce_field( 'aiv_solution_demo', 'aiv_solution_demo_nonce' );
	$value = get_post_meta( $post->ID, '_aiv_solution_demo_url', true );
	$price = get_post_meta( $post->ID, '_aiv_solution_price_from', true );
	?>
	<p><label for="aiv-solution-demo-url"><?php esc_html_e( 'Адрес демо-сайта', 'aiv-web' ); ?></label></p>
	<input class="widefat" id="aiv-solution-demo-url" name="aiv_solution_demo_url" type="url" value="<?php echo esc_attr( $value ); ?>" placeholder="https://aiv-web.ru/dental-1/">
	<p><label for="aiv-solution-price-from"><?php esc_html_e( 'Ориентировочная стоимость от, ₽', 'aiv-web' ); ?></label></p>
	<input class="widefat" id="aiv-solution-price-from" name="aiv_solution_price_from" type="number" min="0" step="1000" value="<?php echo esc_attr( $price ); ?>" placeholder="100000">
	<p class="description"><?php esc_html_e( 'Стоимость необязательна: указывайте минимум только после расчёта состава работ.', 'aiv-web' ); ?></p>
	<p class="description"><?php esc_html_e( 'Превью загрузите в «Изображение записи»: скриншот первого экрана на десктопе, желательно 1600 × 1000 px в WebP. Карточка ведёт на демо-адрес.', 'aiv-web' ); ?></p>
	<?php
}

/**
 * Save the demo URL after editor authorization checks.
 *
 * @param int $post_id Solution post ID.
 */
function aiv_web_save_solution_demo( int $post_id ): void {
	if ( ! isset( $_POST['aiv_solution_demo_nonce'], $_POST['aiv_solution_demo_url'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['aiv_solution_demo_nonce'] ) ), 'aiv_solution_demo' ) ) {
		return;
	}
	if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || wp_is_post_revision( $post_id ) || ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	$url = esc_url_raw( sanitize_text_field( wp_unslash( $_POST['aiv_solution_demo_url'] ) ), array( 'http', 'https' ) );
	if ( '' === $url ) {
		delete_post_meta( $post_id, '_aiv_solution_demo_url' );
	} elseif ( in_array( wp_parse_url( $url, PHP_URL_SCHEME ), array( 'http', 'https' ), true ) ) {
		update_post_meta( $post_id, '_aiv_solution_demo_url', $url );
	}
	if ( isset( $_POST['aiv_solution_price_from'] ) ) {
		$price = absint( wp_unslash( $_POST['aiv_solution_price_from'] ) );
		if ( $price > 0 ) {
			update_post_meta( $post_id, '_aiv_solution_price_from', $price );
		} else {
			delete_post_meta( $post_id, '_aiv_solution_price_from' );
		}
	}
}
add_action( 'save_post_aiv_solution', 'aiv_web_save_solution_demo' );

/** Render the public, filterable solutions catalog. */
function aiv_web_solutions_shortcode(): string {
	$base_url = get_permalink( get_queried_object_id() );
	if ( ! $base_url ) {
		$base_url = home_url( '/solutions/' );
	}
	// phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Public read-only catalog filter.
	$requested     = isset( $_GET['solution_category'] ) ? sanitize_title( wp_unslash( $_GET['solution_category'] ) ) : '';
	$active        = $requested ? get_term_by( 'slug', $requested, 'aiv_solution_category' ) : false;
	$terms         = get_terms(
		array(
			'taxonomy'   => 'aiv_solution_category',
			'hide_empty' => true,
		)
	);
	$args          = array(
		'post_type'      => 'aiv_solution',
		'post_status'    => 'publish',
		'posts_per_page' => -1,
		'no_found_rows'  => true,
		'orderby'        => array(
			'menu_order' => 'ASC',
			'date'       => 'DESC',
		),
	);
	$query         = new WP_Query( $args );
	$visible_count = 0;
	ob_start();
	?>
	<section class="aiv-solutions-catalog" id="solutions" aria-labelledby="aiv-solutions-heading">
		<div class="aiv-solutions-container">
			<div class="aiv-solutions-catalog__head"><p class="aiv-section-kicker"><?php esc_html_e( '02 / КАТАЛОГ', 'aiv-web' ); ?></p><h2 id="aiv-solutions-heading"><?php esc_html_e( 'Выберите направление', 'aiv-web' ); ?></h2></div>
			<nav class="aiv-solutions-filters" aria-label="<?php esc_attr_e( 'Категории решений', 'aiv-web' ); ?>">
				<a href="<?php echo esc_url( $base_url . '#solutions' ); ?>" data-aiv-filter="" <?php echo ! $active ? 'aria-current="page"' : ''; ?>><?php esc_html_e( 'Все', 'aiv-web' ); ?></a>
				<?php if ( ! is_wp_error( $terms ) ) : ?>
					<?php foreach ( $terms as $term ) : ?>
						<a href="<?php echo esc_url( add_query_arg( 'solution_category', $term->slug, $base_url ) . '#solutions' ); ?>" data-aiv-filter="<?php echo esc_attr( (string) $term->term_id ); ?>" <?php echo $active && (int) $active->term_id === (int) $term->term_id ? 'aria-current="page"' : ''; ?>><?php echo esc_html( $term->name ); ?></a>
					<?php endforeach; ?>
				<?php endif; ?>
			</nav>
			<div class="aiv-solutions-mobile-filter">
				<span id="aiv-solutions-category-label"><?php esc_html_e( 'Категория', 'aiv-web' ); ?></span>
				<button class="aiv-solutions-filter-toggle" type="button" role="combobox" aria-expanded="false" aria-haspopup="listbox" aria-controls="aiv-solutions-category-options" aria-labelledby="aiv-solutions-category-label aiv-solutions-category-value">
					<span id="aiv-solutions-category-value"><?php echo $active ? esc_html( $active->name ) : esc_html__( 'Все направления', 'aiv-web' ); ?></span>
					<span class="aiv-solutions-filter-chevron" aria-hidden="true"></span>
				</button>
				<ul class="aiv-solutions-filter-options" id="aiv-solutions-category-options" role="listbox" aria-labelledby="aiv-solutions-category-label" hidden>
					<li id="aiv-solutions-option-all" role="option" data-aiv-filter="" aria-selected="<?php echo ! $active ? 'true' : 'false'; ?>"><?php esc_html_e( 'Все направления', 'aiv-web' ); ?></li>
					<?php if ( ! is_wp_error( $terms ) ) : ?>
						<?php foreach ( $terms as $term ) : ?>
							<li id="aiv-solutions-option-<?php echo esc_attr( (string) $term->term_id ); ?>" role="option" data-aiv-filter="<?php echo esc_attr( (string) $term->term_id ); ?>" aria-selected="<?php echo $active && (int) $active->term_id === (int) $term->term_id ? 'true' : 'false'; ?>"><?php echo esc_html( $term->name ); ?></li>
						<?php endforeach; ?>
					<?php endif; ?>
				</ul>
			</div>
			<p class="aiv-solutions-status screen-reader-text" role="status" aria-live="polite" aria-atomic="true" data-found-label="<?php esc_attr_e( 'Найдено решений', 'aiv-web' ); ?>"></p>
			<div id="aiv-solutions-results">
				<div class="aiv-solutions-grid">
					<?php while ( $query->have_posts() ) : ?>
						<?php
						$query->the_post();
						$demo_url     = get_post_meta( get_the_ID(), '_aiv_solution_demo_url', true );
						$price        = (int) get_post_meta( get_the_ID(), '_aiv_solution_price_from', true );
						$categories   = get_the_terms( get_the_ID(), 'aiv_solution_category' );
						$category     = $categories && ! is_wp_error( $categories ) ? $categories[0]->name : __( 'Решение', 'aiv-web' );
						$category_ids = array();
						if ( $categories && ! is_wp_error( $categories ) ) {
							foreach ( $categories as $solution_category ) {
								$category_ids[] = (int) $solution_category->term_id;
								$category_ids   = array_merge( $category_ids, get_ancestors( $solution_category->term_id, 'aiv_solution_category', 'taxonomy' ) );
							}
						}
						$category_ids = array_unique( array_map( 'intval', $category_ids ) );
						$is_visible   = ! $active || in_array( (int) $active->term_id, $category_ids, true );
						if ( $is_visible ) {
							++$visible_count;
						}
						?>
						<article class="aiv-solution-card" data-aiv-categories="<?php echo esc_attr( implode( ' ', $category_ids ) ); ?>" <?php echo ! $is_visible ? 'hidden' : ''; ?>>
							<?php if ( $demo_url ) : ?>
								<a class="aiv-solution-card__link" href="<?php echo esc_url( $demo_url ); ?>" target="_blank" rel="noopener" aria-label="<?php echo esc_attr( sprintf( /* translators: %s: solution title */ __( 'Открыть демо: %s (в новой вкладке)', 'aiv-web' ), get_the_title() ) ); ?>">
							<?php endif; ?>
								<div class="aiv-solution-card__media">
									<?php if ( has_post_thumbnail() ) : ?>
										<?php
										// WordPress generates and escapes the image HTML.
										// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
										echo get_the_post_thumbnail(
											get_the_ID(),
											'large',
											array(
												'loading'  => 'lazy',
												'decoding' => 'async',
											)
										);
										?>
									<?php else : ?>
										<span aria-hidden="true">AIV-WEB</span>
									<?php endif; ?>
								</div>
								<div class="aiv-solution-card__body">
									<span class="aiv-solution-card__category"><?php echo esc_html( $category ); ?></span>
									<div class="aiv-solution-card__heading">
										<h3><?php echo esc_html( get_the_title() ); ?></h3>
										<?php
										if ( $demo_url ) :
											?>
											<span aria-hidden="true">↗</span><?php endif; ?>
									</div>
									<?php if ( $price > 0 ) : ?>
										<span class="aiv-solution-card__price"><?php echo esc_html( sprintf( /* translators: %s: starting price in rubles */ __( 'от %s ₽', 'aiv-web' ), number_format_i18n( $price, 0 ) ) ); ?></span>
									<?php endif; ?>
									<?php
									if ( has_excerpt() ) :
										?>
										<p><?php echo esc_html( get_the_excerpt() ); ?></p><?php endif; ?>
								</div>
							<?php
							if ( $demo_url ) :
								?>
								</a><?php endif; ?>
						</article>
					<?php endwhile; ?>
				</div>
				<p class="aiv-solutions-empty" <?php echo $visible_count > 0 ? 'hidden' : ''; ?>><?php esc_html_e( 'В этой категории пока нет опубликованных решений.', 'aiv-web' ); ?></p>
			</div>
		</div>
	</section>
	<?php
	wp_reset_postdata();
	return (string) ob_get_clean();
}
add_shortcode( 'aiv_web_solutions', 'aiv_web_solutions_shortcode' );

/**
 * Render the catalog shortcode when it is nested inside the page template pattern.
 *
 * @param string $content Rendered shortcode block content.
 * @param array  $block   Parsed shortcode block.
 * @return string Catalog markup or the original block content.
 */
function aiv_web_render_solutions_shortcode_block( string $content, array $block ): string {
	if ( '[aiv_web_solutions]' !== trim( $block['innerHTML'] ?? '' ) ) {
		return $content;
	}

	return aiv_web_solutions_shortcode();
}
add_filter( 'render_block_core/shortcode', 'aiv_web_render_solutions_shortcode_block', 10, 2 );
