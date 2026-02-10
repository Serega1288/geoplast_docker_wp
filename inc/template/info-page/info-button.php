<?php
$btn1_text = get_field('btn1_text');

$btn2_text = get_field('btn2_text');
$btn2_post_object = get_field('btn2_link'); 

if ($btn1_text || $btn2_text) :
?>
	<div class="button_container flex flex-center wrap_768 gap_20 animate fade-up" data-delay="100">

		<?php if ($btn1_text) : ?>
			<a class="cta connect_cta fill_cta" href="#">
				<?php echo esc_html($btn1_text); ?>
			</a>
		<?php endif; ?>									

		<?php if ($btn2_text && $btn2_post_object) :
			$btn2_url = get_permalink($btn2_post_object->ID);
		?>
			<a class="cta transparent_cta" href="<?php echo esc_url($btn2_url); ?>">
				<?php echo esc_html($btn2_text); ?>
			</a>
		<?php endif; ?>

	</div>
<?php endif; ?>