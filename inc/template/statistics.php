<?php if (have_rows('statistics')): ?>
    <section class="statistic_container dark_mode">
        <div class="wrapper flex-between stats gap_20 wrap_768">

            <?php
            $i = 0;
            // Твої оригінальні затримки
            $auto_delays = [100, 300, 500, 700, 900, 1100]; 

            while (have_rows('statistics')): the_row();
                $prefix_left  = get_sub_field('prefix_right');
                $number       = get_sub_field('number');
                $prefix_right = get_sub_field('prefix_plus');
                $label        = get_sub_field('label');
                $unit_text    = get_sub_field('suffix');
                $desc         = get_sub_field('description');

                $delay = $auto_delays[$i] ?? ($i * 200);
                $i++;
            ?>
                <div class="animate fade-up" data-delay="<?php echo esc_attr($delay); ?>">

                    <p class="border_bottom">
                        <?php if ($prefix_left): ?>
                            <span class="simbol_text"><?php echo esc_html($prefix_left); ?></span>
                        <?php endif; ?>

                        <span class="counter" data-target="<?php echo esc_attr($number); ?>">0</span>

                        <?php if ($prefix_right): ?>
                            <span class="simbol_text"><?php echo esc_html($prefix_right); ?></span>
                        <?php endif; ?>

                        <?php if ($label): ?>
                            <?php echo ' ' . esc_html($label); ?>
                        <?php endif; ?>

                        <?php if ($unit_text): ?>
                            <sup><?php echo esc_html($unit_text); ?></sup>
                        <?php endif; ?>
                    </p>

                    <?php if ($desc): ?>
                        <p><?php echo esc_html($desc); ?></p>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>

        </div>
    </section>
<?php endif; ?>