<?php
$file   = get_field('file');
if($file != null):
    $name   = $file['title'];
    $format = $file['subtype'];
    $link   = $file['url'];
    // echo '<pre>';
    // print_r($file);
    // echo '</pre>';
    ?>
    <div class="library-card small-12 medium-6 large-6 columns text-center">
        <a href="<?php echo $link; ?>" download>
            <div class="text">
                <h2><?php echo $name; ?></h2>
                <p><?php echo $format; ?></p>
            </div>
            <div class="icon">
                <i class="fas fa-download"></i>
            </div>
        </a>
    </div>
    <?php $do_not_duplicate[] = $post->ID; // Store post ID in array ?>
<?php endif; ?>