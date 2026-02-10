<?php
$table_title = get_field('table_title') ?: 'Модельний ряд';
?>

<section class="table_container">
	<div class="wrapper">
		<h2 class="page_h2"><?php echo esc_html($table_title); ?></h2>

		<?php if (have_rows('product_table')): ?>
			<div class="table_block">
				<table>
					<thead>
						<tr>
							<th>Модель</th>
							<th>Зусилля змикання</th>
							<th>Обʼєм вприскування, см<sup>3</sup></th>
							<th>Відстань між колонами, мм</th>
						</tr>
					</thead>
					<tbody>
						<?php while (have_rows('product_table')): the_row();
							$name    = get_sub_field('model_name');
							$force   = get_sub_field('clamping_force');
							$volume  = get_sub_field('injection_volume');
							$spacing = get_sub_field('tie_bar_spacing');
						?>
							<tr>
								<td><?php echo esc_html($name); ?></td>
								<td><?php echo esc_html($force); ?></td>
								<td><?php echo esc_html($volume); ?></td>
								<td><?php echo esc_html($spacing); ?></td>
							</tr>
						<?php endwhile; ?>
					</tbody>
				</table>
			</div>
		<?php else: ?>
			<p>Дані для таблиці наразі відсутні.</p>
		<?php endif; ?>
	</div>
</section>