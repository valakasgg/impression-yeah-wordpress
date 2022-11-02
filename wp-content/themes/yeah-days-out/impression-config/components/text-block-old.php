<?php 
global $flex;
if( have_rows('columns') ):
    $rowCount = 0;
    $colCount = 0;
    while( have_rows('columns') ): the_row();
        $rowCount++;
    endwhile;
    ?>
    <section id="textBlock-<?php echo $rowCount ?>;" class="textBlock">
        <div class="main-content">
            <div class="row">
                <?php while( have_rows('columns') ): the_row();
                    $components = get_sub_field('column_components');
                    $align = get_sub_field('column_align');
                    $content = get_sub_field('content');
                    $size = 'standard-image';
                    $colCount++;

                    // echo '<pre>';
                    // print_r($form);
                    // echo '</pre>';
                    ?>
                    <div class="textItem">
                        <?php if(in_array("content", $components) == true): ?>
                            <!-- Content -->
                            <div class="content">
                                <?php echo $content; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php wp_reset_query(); ?>