<?php
    $content = get_field('discount_content');
    $background = get_field('discount_background');
?>
<section class="discountContent py-2" <?php if($background){ ?> style="background-color: <?php echo $background; ?>" <?php } ?>>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <?php echo $content; ?>
            </div>
        </div>
    </div>
</section>
