<?php
$rowCount   = count(get_sub_field('columns'));
$rowPadding = get_sub_field('row_size');

if (have_rows('columns')) :
?>
    <div class="container mb-5">
        <div class="row<?php echo ' '.$rowPadding; ?>">
            <?php
            while (have_rows('columns')) : the_row();
                $type    = get_sub_field('type');
                $content = get_sub_field('text_block_content');
                $image   = get_sub_field('image');
                $form    = get_sub_field('form');
                switch ($rowCount) {
                    case 1:
                        $columnClass = 'col-12 '.$rowPadding;
                        ?>
                        <div class="icons">
                            <div class="top">
                                <svg width="149" height="160" viewBox="0 0 149 160" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M71.4376 133.596C87.7089 122.655 67.8202 98.6279 55.1374 98.7562C42.4547 98.8845 34.6809 106.618 37.457 127.893C40.233 149.168 55.1663 144.536 71.4376 133.596Z" fill="#44C6B0"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M73.596 65.0055C86.7499 65.0247 84.7018 44.2013 77.5999 39.515C70.498 34.8287 63.2733 36.2136 56.8363 49.0868C50.3994 61.9599 60.4421 64.9863 73.596 65.0055Z" fill="#44C6B0"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M127.412 48.4186C122.558 53.7041 131.939 60.5197 136.497 59.3815C141.055 58.2433 143.143 54.8283 140.181 47.5155C137.22 40.2027 132.266 43.1331 127.412 48.4186Z" fill="#44C6B0"/>
                                </svg>
                            </div>
                            <div class="bottom">
                                <svg width="104" height="85" viewBox="0 0 104 85" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M41.2694 64.5759C54.0542 57.2195 40.3901 38.1458 30.8657 37.5767C21.3414 37.0076 15.1018 42.4032 16.0685 58.5137C17.0351 74.6241 28.4846 71.9323 41.2694 64.5759Z" fill="#44C6B0"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M75.8691 22.7581C74.3081 29.7625 85.8402 30.9744 89.2183 27.7098C92.5965 24.4452 92.6972 20.4437 86.476 15.5913C80.2549 10.739 77.4301 15.7537 75.8691 22.7581Z" fill="#44C6B0"/>
                                </svg>
                            </div>
                        </div>
                        <?php
                        break;
                    case 2:
                        $columnClass = 'col-12 col-lg-6 '.$rowPadding;
                        break;
                    case 3:
                        $columnClass = 'col-12 col-lg-4 '.$rowPadding;
                        break;
                }
                ?>
                <div class="<?php echo $columnClass.' '; ?>py-5" data-aos="fade-up" data-aos-duration="750" data-aos-delay="500">
                    <?php
                    switch ($type) {
                        case 'content':
                            echo $content;
                            break;
                        case 'image':
                            echo wp_get_attachment_image($image, 'square-custom');
                            break;
                        case 'form':
                            echo do_shortcode('[gravityform id="'.$form.'" title="false" description="false" ajax="true"]');
                            break;
                    } ?>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php endif;?>