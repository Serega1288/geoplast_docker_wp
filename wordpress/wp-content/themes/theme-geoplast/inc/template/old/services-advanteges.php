<?php
$adv_sec_title = get_field('advant_sec_title');
?>

<section class="advantages_container wrapper animate fade-up" data-delay="100">
	<?php if ($adv_sec_title) : ?>
		<h2 class="page_h2"><?php echo esc_html($adv_sec_title); ?></h2>
	<?php endif; ?>

	<?php if (have_rows('advant_list')) : ?>
		<div class="grid col_3 gap_30 adv_services">
			<?php
			$i = 0;
			while (have_rows('advant_list')) : the_row();
				$card_title = get_sub_field('advant_card_title');
				$card_p1    = get_sub_field('advant_card_text_1');
				$card_p2    = get_sub_field('advant_card_text_2');

				$anim_type = ($i === 0) ? 'fade-left' : 'fade-up';
				$delay = 150 + ($i * 100);
				$i++;
			?>
				<div class="advant_block animate <?php echo $anim_type; ?>" data-delay="<?php echo $delay; ?>">
					<?php if ($card_title) : ?>
						<h3><?php echo esc_html($card_title); ?></h3>
					<?php endif; ?>

					<?php if ($card_p1) : ?>
						<p><?php echo esc_html($card_p1); ?></p>
					<?php endif; ?>

					<?php if ($card_p2) : ?>
						<p><?php echo esc_html($card_p2); ?></p>
					<?php endif; ?>
				</div>
			<?php endwhile; ?>
		</div>
	<?php endif; ?>
</section>