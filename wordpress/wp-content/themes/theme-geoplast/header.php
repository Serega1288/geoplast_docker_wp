<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, user-scalable=yes, minimum-scale=1.0, maximum-scale=2.0, initial-scale=1.0">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php
	$header_logo    = get_field('header_logo', 'option');
	$popup_title    = get_field('popap_title', 'option');
	$phone_1        = get_field('setting_number_1', 'option');
	$phone_2        = get_field('setting_number_2', 'option');
	$header_buttons = get_field('list_button_header', 'option');
	?>

	<div class="dark-bgc"></div>

	<div class="popup">
		<a class="cancel_popup" href="#">
			<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
				<path d="M0.75 16.75L16.75 0.75" stroke="#BDBDBD" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
				<path d="M16.75 16.75L0.75 0.75" stroke="#BDBDBD" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
			</svg>
		</a>
		<div class="grid btn_popup_col">
			<a class="flex flex-center items-center manager switch_btn active" href="#" data-target="manager_block">Менеджер з продажу</a>
			<a class="flex flex-center items-center send_message switch_btn" href="#" data-target="form_send_message">Залишити заявку</a>
		</div>

		<div class="manager_block switch_block active" id="manager_block">
			<h3 class="page_h3"><?php echo esc_html($popup_title ?: 'Зв’яжіться напряму з менеджером'); ?></h3>
			<p>Наш менеджер з продажу готовий відповісти на всі ваші запитання щодо продукції, цін та умов співпраці.</p>
			<div class="flex flex-center items-center gap_20">
				<?php if ($phone_1): ?>
					<a href="tel:<?php echo preg_replace('/[^0-9+]/', '', $phone_1); ?>"><?php echo esc_html($phone_1); ?></a>
				<?php endif; ?>

				<?php if ($phone_2): ?>
					<a href="tel:<?php echo preg_replace('/[^0-9+]/', '', $phone_2); ?>"><?php echo esc_html($phone_2); ?></a>
				<?php endif; ?>
			</div>
		</div>

		<div class="form_send_message switch_block" id="form_send_message">
			<h3 class="page_h3 tac">Заповніть форму, і наш менеджер зателефонує вам</h3>
			<form action="#">
				<div class="grid col_2 gap_20">
					<p><label for="name">Імʼя<span>*</span></label><input id="name" type="text" name="userName" minlength="3" maxlength="30" required></p>
					<p><label for="surname">Прізвище</label><input id="surname" type="text" name="userName" minlength="3" maxlength="30" required></p>
					<p><label for="userPhone">Телефон<span>*</span></label><input class="phoneInput inputMask" type="tel" name="userPhone" required maxlength="13"></p>
					<p><label for="email">E-mail</label><input id="email" type="email" name="email" required></p>
				</div>
				<p><label for="textarea">Коментар</label><textarea id="textarea" name="textarea"></textarea></p>
				<div class="flex flex-center items-center gap_20"> <button class="cta fill_cta">Відправити</button></div>
			</form>
		</div>
	</div>

	<header class="fixed_header dark_mode">
		<div class="wrapper_header flex-between header items-center gap_30">
			<div class="logo">
				<a href="<?php echo home_url(); ?>">
					<?php if ($header_logo): ?>
						<img src="<?php echo esc_url($header_logo['url']); ?>" alt="<?php echo esc_attr($header_logo['alt']); ?>">
					<?php else: ?>
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg" alt="<?php bloginfo('name'); ?>">
					<?php endif; ?>
				</a>
			</div>

			<nav class="navigation nav">
				<ul class="navigation_menu">
					<li class="cancel_li"><a class="cancel" href="#">X</a></li>
					<li><a href="<?php echo home_url(); ?>">Головна</a></li>

					<?php
					$menu_items = [
						'info' => 'Рішення під ключ',
						'services' => 'Сервіс та гарантія',
						'catalogue' => 'Термопластавтомати',
						'news' => 'Новини',
						'contacts' => 'Контакти',
					];

					foreach ($menu_items as $slug => $title) :
						$page = get_page_by_path($slug);
						if (!$page) {
							$page = get_page_by_title($title);
						}
						$link = $page ? get_permalink($page->ID) : '#';
					?>
						<li><a href="<?php echo esc_url($link); ?>"><?php echo esc_html($title); ?></a></li>
					<?php endforeach; ?>

					<li class="mobile_btn"><a class="cta connect_cta transparent_cta" href="#">Звʼязатися з нами</a></li>
				</ul>
			</nav>

			<div class="button desctop_btn">
				<?php
				if (have_rows('list_button_header', 'option')):
					while (have_rows('list_button_header', 'option')): the_row();
						$btn_link = get_sub_field('button');
						$btn_label = get_sub_field('but1');
				?>
						<a class="cta connect_cta transparent_cta" href="<?php echo esc_url($btn_link['url'] ?? '#'); ?>">
							<?php echo esc_html($btn_label ?: 'Звʼязатися з нами'); ?>
						</a>
					<?php endwhile;
				else: ?>
					<a class="cta connect_cta transparent_cta" href="#">Звʼязатися з нами</a>
				<?php endif; ?>
			</div>

			<div class="burger"> <span class="bord b1"></span><span class="bord b2"></span><span class="bord b3"></span></div>
		</div>
	</header>