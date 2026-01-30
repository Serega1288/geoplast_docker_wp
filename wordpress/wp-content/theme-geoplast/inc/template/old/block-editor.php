<?php include 'block-option.php';

$editor = get_sub_field('editor');
?>

<section
    class="section block-content">
    <div class="container">
        <div class="text">
            <?php echo $editor; ?>
        </div>
    </div>
</section>