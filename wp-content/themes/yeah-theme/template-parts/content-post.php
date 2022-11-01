<?php
$article    = get_the_ID();
$ID         = get_post_thumbnail_id($article);
$date       = get_the_date($article);
$title      = get_the_title();
$link       = get_the_permalink();
?>
<div class="article-card small-12 medium-6 large-6 columns">
    <a href="<?php echo $link; ?>">
        <div class="img">
            <?php echo wp_get_attachment_image( $ID, $size ); ?>
        </div>
        <div class="click">
            <div class="text">
                <div class="title">
                    <?php echo $title; ?>
                </div>
                <div class="date">
                    <?php echo get_the_date(); ?>
                </div>
            </div>
            <div class="icon">
                <i class="fas fa-chevron-right"></i>
            </div>
        </div>
    </a>
</div>