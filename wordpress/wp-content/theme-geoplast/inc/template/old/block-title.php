<?php include 'block-option.php';

$title = get_sub_field('title');
$h = get_sub_field('h');
?>

<section
    <?php if( get_sub_field('id_block') ) : ?>
        id="<?php the_sub_field('id_block'); ?>"
    <?php else : ?>
        id="section-<?php echo $args; ?>"
    <?php endif; ?>
    class="section block-content">
    <div class="container">
        <div class="wrap-title">
            <<?php echo $h; ?> class="block-title">
            <?php echo $title; ?>
            </<?php echo $h; ?>>
        </div>
    </div>
</section>