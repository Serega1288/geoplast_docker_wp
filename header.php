<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div class="dark-bgc"></div>

	<?php
	$h_btn_text      = get_field('header_btn_text', 'options') ?: 'Зв’язатися з нами';
	$h_btn_show      = get_field('header_btn_show', 'options');
	$mgr_title       = get_field('popup_mgr_title', 'options') ?: 'Зв’яжіться напряму з менеджером';
	$mgr_text        = get_field('popup_mgr_text', 'options') ?: 'Наш менеджер з продажу готовий відповісти на всі ваші запитання щодо продукції, цін та умов співпраці.';
	$phone1          = get_field('header_phone', 'options');
	$phone2          = get_field('header_phone2', 'options');
	$popup_btn_mgr   = get_field('popup_btn_manager', 'options') ?: 'Менеджер з продажу';
	$popup_btn_form  = get_field('popup_btn_form', 'options') ?: 'Залишити заявку';
	$popup_form_title = get_field('popup_form_title', 'options') ?: 'Заповніть форму, і наш менеджер зателефонує вам';
	$popup_shortcode  = get_field('popup_form_shortcode', 'options');
	?>

	<div class="popup">
		<a class="cancel_popup" href="#">
			<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
				<path d="M0.75 16.75L16.75 0.75" stroke="#BDBDBD" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
				<path d="M16.75 16.75L0.75 0.75" stroke="#BDBDBD" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
			</svg>
		</a>

		<div class="grid btn_popup_col">
			<a class="flex flex-center items-center manager switch_btn active" href="#" data-target="manager_block">
				<?php echo esc_html($popup_btn_mgr); ?>
			</a>
			<a class="flex flex-center items-center send_message switch_btn" href="#" data-target="form_send_message">
				<?php echo esc_html($popup_btn_form); ?>
			</a>
		</div>

		<div class="manager_block switch_block active" id="manager_block">
			<h3 class="page_h3"><?php echo esc_html($mgr_title); ?></h3>
			<p><?php echo esc_html($mgr_text); ?></p>
			<div class="flex flex-center items-center gap_20">
				<?php if ($phone1): ?>
					<a href="tel:<?php echo preg_replace('/[^0-9+]/', '', $phone1); ?>">
						<?php echo esc_html($phone1); ?>
					</a>
				<?php endif; ?>

				<?php if ($phone2): ?>
					<a href="tel:<?php echo preg_replace('/[^0-9+]/', '', $phone2); ?>">
						<?php echo esc_html($phone2); ?>
					</a>
				<?php endif; ?>
			</div>
		</div>

		<div class="form_send_message switch_block" id="form_send_message">
			<h3 class="page_h3 tac"><?php echo esc_html($popup_form_title); ?></h3>
			<?php
			if ($popup_shortcode) {
				echo do_shortcode($popup_shortcode);
			} else {
				echo do_shortcode('[contact-form-7 id="064c985" title="Popup Header"]');
			}
			?>
		</div>
	</div>

	<header class="fixed_header dark_mode">
		<div class="wrapper_header flex-between header items-center gap_30">
			<div class="logo">
				<?php
				$logo = get_field('header_logo', 'options');
				if ($logo): ?>
					<a href="<?php echo home_url(); ?>">
						<img src="<?php echo esc_url($logo['url']); ?>" alt="<?php bloginfo('name'); ?>">
					</a>
				<?php else: ?>
					<a href="<?php echo home_url(); ?>" class="logo-text"><?php bloginfo('name'); ?></a>
				<?php endif; ?>
			</div>

			<nav class="navigation nav">
				<?php
				wp_nav_menu(array(
					'theme_location' => 'header-menu-1',
					'container'      => false,
					'menu_class'     => 'navigation_menu',
					'items_wrap'     => '<ul class="%2$s"><li class="cancel_li"><a class="cancel" href="#">X</a></li>%3$s' .
						($h_btn_show !== false ? '<li class="mobile_btn"><a class="cta connect_cta transparent_cta" href="#">' . esc_html($h_btn_text) . '</a></li>' : '') .
						'</ul>',
					'fallback_cb'    => false,
				));
				?>
			</nav>

			<?php if ($h_btn_show !== false) : ?>
				<div class="button desctop_btn">
					<a class="cta connect_cta transparent_cta" href="#">
						<?php echo esc_html($h_btn_text); ?>
					</a>
				</div>
			<?php endif; ?>

			<div class="burger">
				<span class="bord b1"></span>
				<span class="bord b2"></span>
				<span class="bord b3"></span>
			</div>
		</div>
	</header>