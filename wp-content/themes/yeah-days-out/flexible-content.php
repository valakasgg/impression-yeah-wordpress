<?php
// Check & Loop through sections
if (have_rows('flexible_content')) :
    $sectionCount = 0;
    while (have_rows('flexible_content')) : the_row();
    // Increase count for section ID's
    $sectionCount++;
        // Get section name
        $name      = get_row_layout();
        $nameValid = str_replace('_', '-', $name);
        ?>
        <section id="<?php echo $name . '-' . $sectionCount; ?>" class="<?php echo $name; ?>">
            <?php
            // get matching template for name
            if ($nameValid) :
                get_template_part('flexible-content/components/' . $nameValid);
            endif;
            ?>
        </section>
    <?php
    endwhile;
else :
    echo '404';
endif;
?>