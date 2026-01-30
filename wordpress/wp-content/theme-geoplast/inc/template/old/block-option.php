<?php
$padding_top = get_sub_field('padding_top');
$padding_top_mobile = get_sub_field('padding_top_mobile');
$padding_bottom = get_sub_field('padding_bottom');
$padding_bottom_mobile = get_sub_field('padding_bottom_mobile');
if (
    strlen($padding_top) !==0  ||
    strlen($padding_top_mobile) !==0 ||
    strlen($padding_bottom) !==0 ||
    strlen($padding_bottom_mobile) !==0
) :
    ?>
    <style>
        <?php if ( strlen($padding_top) !==0  || strlen($padding_bottom) !==0 ) : ?>
        #section-<?php echo $args; ?> {
        <?php if ( strlen($padding_top) !==0  ) : ?>
            padding-top: <?php echo $padding_top; ?>rem;
        <?php endif; ?>
        <?php if ( strlen($padding_bottom) !==0  ) : ?>
            padding-bottom: <?php echo $padding_bottom; ?>rem;
        <?php endif; ?>
        }
        <?php endif; ?>
        <?php if ( strlen($padding_top_mobile) !==0  || strlen($padding_bottom_mobile) !==0  ) : ?>
        @media (max-width: 576px) {
            #section-<?php echo $args; ?> {
            <?php if ( strlen($padding_top_mobile) !==0  ) : ?>
                padding-top: <?php echo $padding_top_mobile; ?>rem;
            <?php endif; ?>
            <?php if ( strlen($padding_bottom_mobile) !==0  ) : ?>
                padding-bottom: <?php echo $padding_bottom_mobile; ?>rem;
            <?php endif; ?>
            }
        }
        <?php endif; ?>
    </style>
<?php endif; ?>