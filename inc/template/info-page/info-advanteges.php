<?php

/**
 * Component: Advantages Section
 * Твій ACF Repeater: advantages_list
 * Вкладені поля (згідно з твоїм скріншотом): adv_icon та adv_text
 */
?>
<section class="advantages_container wrapper animate fade-up show" data-delay="200">
	<h2 class="page_h2">Наші переваги</h2>

	<div class="grid col_4 gap_30">
		<?php
		// Використовуємо get_the_ID(), щоб код точно знав, з якої сторінки брати репітер
		if (have_rows('advantages_list', get_the_ID())) :
			$delay = 250;

			while (have_rows('advantages_list', get_the_ID())) : the_row();
				// ВАЖЛИВО: імена мають бути такими ж, як у колонці "Ім'я" в ACF
				$icon = get_sub_field('adv_icon');
				$text = get_sub_field('adv_text');
		?>
				<div class="advant_block animate fade-up show" data-delay="<?php echo $delay; ?>">
					<?php if ($icon) : ?>
						<div class="adv_icon_svg">
							<?php echo $icon; // Виводить SVG код напряму 
							?>
						</div>
					<?php endif; ?>

					<?php if ($text) : ?>
						<p><?php echo esc_html($text); ?></p>
					<?php endif; ?>
				</div>
		<?php
				$delay += 50;
			endwhile;
		else :
			// Це повідомлення побачиш тільки ти, якщо зайдеш під адміном і поля будуть порожні
			if (is_user_logged_in()) echo "<p>Додайте переваги в адмінці сторінки!</p>";
		endif;
		?>
	</div>
</section>