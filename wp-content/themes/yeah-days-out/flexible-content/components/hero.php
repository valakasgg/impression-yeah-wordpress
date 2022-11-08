<?php
if (have_rows('slide')) :
    ?>
    <script>  
        (function() {
            $( document ).ready(function() {
                var swiper = new Swiper(".swiper-hero", {
                    centeredSlides: false,
                    // pagination: {
                    //     el: ".swiper-pagination",
                    // },
                    navigation: {
                        nextEl: ".swiper-button-next",
                        prevEl: ".swiper-button-prev",
                    },
                    autoplay: {
                        delay: 12000,
                        disableOnInteraction: true,
                    },
                    // loop: true,
                });
            });
        })();
    </script>
    <div class="swiper swiper-hero">
        <div class="swiper-wrapper">
            <?php
            while (have_rows('slide')) : the_row();
                $type       = get_sub_field('hero_type');
                $image      = get_sub_field('hero_image');
                $video      = get_sub_field('hero_video');
                $content    = get_sub_field('hero_content');
                $offer      = get_sub_field('show_offer');
                $offerNum   = get_sub_field('percentage');
                $offerText  = get_sub_field('text');

                // Set videos
                if (have_rows('hero_video')) :
                    while (have_rows('hero_video')) : the_row();
                        $mp4 = get_sub_field('mp4');
                        if ($mp4) {
                            $mp4_url = $mp4['url'];
                        }
                        $ogg = get_sub_field('ogg');
                        if ($ogg) {
                            $ogg_url = $ogg['url'];
                        }
                        $webm = get_sub_field('webm');
                        if ($webm) {
                            $webm_url = $webm['url'];
                        }
                    endwhile;
                endif;
                ?>
                <div class="swiper-slide slide">
                    <?php if ($type == 'video') : ?>
                        <?php if ($video) : ?>
                            <div class="video">
                                <div class="overlay"></div>
                                <video class="header-video" width="100%" loop="true" autoplay="autoplay" muted="false" playsinline style="background-color: #fff;">
                                    <?php if ($mp4) { ?>
                                        <source src="<?php echo $mp4_url; ?>" type="video/mp4">
                                    <?php } ?>
                                    <?php if ($ogg) { ?>
                                        <source src="<?php echo $ogg_url; ?>" type="video/ogg">
                                    <?php } ?>
                                    <?php if ($webm) { ?>
                                        <source src="<?php echo $webm_url; ?>" type="video/webm">
                                    <?php } ?>
                                </video>
                            </div>
                        <?php endif ?>
                    <?php else: ?>
                        <div class="image">
                            <div class="overlay"></div>
                            <picture>
                                <source media="(max-width: 1199px)" srcset="<?php echo wp_get_attachment_image_src($image, 'hero-image-mobile')[0]; ?>">
                                <source media="(min-width: 1200px)" srcset="<?php echo wp_get_attachment_image_src($image, 'hero-image')[0]; ?>">
                                <img aria-hidden="true" decoding="async" src="<?php echo wp_get_attachment_image_src($image, 'hero-image-mobile ')[0]; ?>">
                            </picture>
                        </div>
                    <?php endif ?>
                    <div class="container">
                        <div class="row" data-aos="fade-in" data-aos-duration="1500" data-aos-delay="500">
                            <div class="col-12">
                                <?php if ($content): ?>
                                    <div class="content">
                                        <?php echo $content; ?>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                        <?php if($offer): ?>
                            <div class="offer" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="1000">
                                <div class="circle">
                                    <div class="content">
                                        <div class="number">
                                            <?php echo $offerNum; ?>
                                            <div class="stack">
                                                <ul>
                                                    <li>
                                                    %
                                                    </li>
                                                    <li>
                                                    off
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="text">
                                            <?php echo $offerText; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="curve">
                        <div class="mobile">
                            <svg id="curve-svg-mobile" viewBox="0 0 400 400">
                                <path fill="#782d70" stroke="#782d70" d="M 0 250 Q 0 300 400 150 L 400 400 L 0 400 Z" />
                            </svg>
                        </div>
                        <div class="desktop">
                            <svg id="curve-svg-desktop" viewBox="0 0 1400 400">
                                <path fill="#782d70" stroke="#782d70" d="M 0 0 Q 300 400 1400 0 L 1400 400 L 0 400 Z" />
                            </svg>
                        </div>
                    </div>
                </div>
            <?php
            endwhile;
            ?>
        </div>
        <div class="container button-wrapper">
            <div class="swiper-buttons">
                <div class="swiper-button-next">
                    <svg width="76" height="75" viewBox="0 0 76 75" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M74.502 35.932C77.0697 4.77998 33.4825 -7.72818 16.4037 5.50514C-0.675118 18.7385 -7.34623 37.2269 14.6145 60.8411C36.5752 84.4552 71.9343 67.084 74.502 35.932Z" fill="white"/>
                    <path d="M35 29L42.6364 36.0417L35 43" stroke="#001F5F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div class="swiper-button-prev">
                    <svg width="76" height="75" viewBox="0 0 76 75" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M74.502 35.932C77.0697 4.77998 33.4825 -7.72818 16.4037 5.50514C-0.675118 18.7385 -7.34623 37.2269 14.6145 60.8411C36.5752 84.4552 71.9343 67.084 74.502 35.932Z" fill="white"/>
                    <path d="M35 29L42.6364 36.0417L35 43" stroke="#001F5F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>
            <div class="swiper-pagination">
                <svg width="105" height="28" viewBox="0 0 105 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M16.6257 24.3888C26.0145 22.6477 26.362 9.07576 21.1473 5.20262C15.9326 1.32949 9.96564 0.87777 4.68234 9.09503C-0.600957 17.3123 7.23682 26.1298 16.6257 24.3888Z" fill="white"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M44.0923 14.2293C44.5029 9.00507 37.3579 6.89315 34.5641 9.10727C31.7703 11.3214 30.6834 14.4203 34.2888 18.388C37.8943 22.3558 43.6816 19.4535 44.0923 14.2293Z" fill="#B21D81"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M67.0923 14.2293C67.5029 9.00507 60.3579 6.89315 57.5641 9.10727C54.7703 11.3214 53.6834 14.4203 57.2888 18.388C60.8943 22.3558 66.6816 19.4535 67.0923 14.2293Z" fill="#B21D81"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M91.0923 14.2293C91.5029 9.00507 84.3579 6.89315 81.5641 9.10727C78.7703 11.3214 77.6834 14.4203 81.2888 18.388C84.8943 22.3558 90.6816 19.4535 91.0923 14.2293Z" fill="#B21D81"/>
                </svg>
            </div>
        </div>
    </div>
    <?php
endif;
?>