<!--

Website by Impression Studio

Get in touch - hello@impression.studio

-->
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<?php get_template_part('admin-variables'); ?>
	<?php wp_head(); ?>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title(''); ?></title>
	<link rel="profile" href="https://gmpg.org/xfn/11">

    <!-- Font Awesome  -->
	<!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.2/css/all.css"> -->
</head>

<body <?php body_class(); ?>>
    <?php
    // Vars
    $discount  = get_field('show_header_discount');
    $logo  = get_field('logo', 'options');

    // Show/ hide discount
    if($discount):
        get_template_part( 'flexible-content/components/discount' );
    endif;
    ?>

    <header>
        <div class="container">
            <nav>
                <div class="menuIcon">
                    <div class="row">
                        <div id="menu-bar" class="menu menu-bar">
                            <div class='handle'></div>
                            <div class='handle'></div>
                            <div class='handle'></div>
                        </div>
                    </div>
                </div>
                <div class="logo">
                    <?php echo wp_get_attachment_image($logo, 'logo-custom'); ?>
                </div>
                <nav class="desktop">
                    <?php
                    if (has_nav_menu('primary')) :
                    wp_nav_menu(array(
                        'theme_location' => 'primary', // Do not fall back to first non-empty menu.
                    ));
                    endif;
                    ?>
                </nav>
                <div class="interactions">
                    <ul>
                        <li class="booking">
                            <a href="#" class="button button--white">
                                Make a booking
                            </a>
                        </li>
                        <li class="account">
                            <a href="#">
                                <div class="mobile">
                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                        viewBox="0 0 51 51" style="enable-background:new 0 0 51 51;" xml:space="preserve">
                                    <style type="text/css">
                                        .st0{fill:none;stroke:#001f5f;stroke-width:2;}
                                        .st1{fill:none;stroke:#000;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;}
                                    </style>
                                    <circle class="st0" cx="25.5" cy="25.5" r="24.5"/>
                                    <g>
                                        <g>
                                            <path class="st1" d="M25.5,13.5c3,0,5.5,2.5,5.5,5.6c0,3.1-2.5,5.6-5.5,5.6c-3.1,0-5.5-2.5-5.5-5.6C20,16,22.5,13.5,25.5,13.5z"/>
                                            <path class="st1" d="M15.2,35.7c0-5.7,4.6-10.4,10.3-10.4c5.7,0,10.3,4.6,10.3,10.4"/>
                                        </g>
                                    </g>
                                    </svg>
                                </div>
                                <div class="desktop">
                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                        viewBox="0 0 51 51" style="enable-background:new 0 0 51 51;" xml:space="preserve">
                                    <style type="text/css">
                                        .st0{fill:none;stroke:#001f5f;stroke-width:2;}
                                        .st1{fill:none;stroke:#000;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;}
                                    </style>
                                    <circle class="st0" cx="25.5" cy="25.5" r="24.5"/>
                                    <g>
                                        <g>
                                            <path class="st1" d="M25.5,13.5c3,0,5.5,2.5,5.5,5.6c0,3.1-2.5,5.6-5.5,5.6c-3.1,0-5.5-2.5-5.5-5.6C20,16,22.5,13.5,25.5,13.5z"/>
                                            <path class="st1" d="M15.2,35.7c0-5.7,4.6-10.4,10.3-10.4c5.7,0,10.3,4.6,10.3,10.4"/>
                                        </g>
                                    </g>
                                    </svg>
                                </div>
                            </a>
                        </li>
                        <li class="basket">
                            <a href="#">
                                <div class="mobile">
                                    <svg width="51" height="52" viewBox="0 0 51 52" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g filter="url(#filter0_d_4_39)">
                                    <path d="M25.5 50C39.031 50 50 39.031 50 25.5C50 11.969 39.031 1 25.5 1C11.969 1 1 11.969 1 25.5C1 39.031 11.969 50 25.5 50Z" stroke="black" stroke-width="2"/>
                                    <mask id="mask0_4_39" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="14" y="15" width="24" height="21">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14 15H38V36H14V15Z" fill="#001F5F"/>
                                    </mask>
                                    <g mask="url(#mask0_4_39)">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M35.8892 23.1245L33.3174 32.3763C33.1772 32.8844 32.875 33.3391 32.4661 33.6577C32.0573 33.9762 31.5499 34.1515 31.0371 34.1515H20.9674C20.4549 34.1515 19.9473 33.9762 19.5384 33.6577C19.1295 33.3391 18.8273 32.884 18.6874 32.3756L16.1208 23.1245H35.8892ZM37.8059 21.6124C37.6277 21.3791 37.3466 21.2462 37.0714 21.2561H33.3765L30.7567 15.5204C30.5391 15.0671 30.0017 14.8726 29.5566 15.0877C29.1121 15.3024 28.9139 15.8528 29.1163 16.3182L31.371 21.2536H20.6393L22.8958 16.3147C23.0968 15.8528 22.8983 15.3028 22.4538 15.0877C22.0093 14.8729 21.4709 15.0671 21.2523 15.5243L18.6339 21.2561L14.9287 21.2565C14.6434 21.2508 14.3695 21.3823 14.1934 21.6124C14.0149 21.846 13.9551 22.1574 14.0342 22.4461L16.9445 32.8897C17.1976 33.7796 17.7336 34.5764 18.4533 35.1329C19.1733 35.6896 20.0664 35.9979 20.9678 36H31.045C31.9471 35.9968 32.8405 35.6872 33.5609 35.1275C34.2813 34.5682 34.8162 33.7683 35.0673 32.8744L37.9665 22.4426C38.0446 22.156 37.9845 21.8456 37.8059 21.6124Z" fill="#001F5F"/>
                                    </g>
                                    </g>
                                    <defs>
                                    <filter id="filter0_d_4_39" x="-4" y="0" width="59" height="59" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                    <feOffset dy="4"/>
                                    <feGaussianBlur stdDeviation="2"/>
                                    <feComposite in2="hardAlpha" operator="out"/>
                                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_4_39"/>
                                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_4_39" result="shape"/>
                                    </filter>
                                    </defs>
                                    </svg>

                                </div>
                                <div class="desktop">
                                    <svg width="100" height="100" viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M25.5 50C39.031 50 50 39.031 50 25.5C50 11.969 39.031 1 25.5 1C11.969 1 1 11.969 1 25.5C1 39.031 11.969 50 25.5 50Z" stroke="white" stroke-width="2"/>
                                    <mask id="mask0_4_38" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="14" y="15" width="24" height="21">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14 15H38V36H14V15Z" fill="white"/>
                                    </mask>
                                    <g mask="url(#mask0_4_38)">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M35.8892 23.1245L33.3174 32.3763C33.1772 32.8844 32.875 33.3391 32.4661 33.6577C32.0573 33.9762 31.5499 34.1515 31.0371 34.1515H20.9674C20.4549 34.1515 19.9473 33.9762 19.5384 33.6577C19.1295 33.3391 18.8273 32.884 18.6874 32.3756L16.1208 23.1245H35.8892ZM37.8059 21.6124C37.6277 21.3791 37.3466 21.2462 37.0714 21.2561H33.3765L30.7567 15.5204C30.5391 15.0671 30.0017 14.8726 29.5566 15.0877C29.1121 15.3024 28.9139 15.8528 29.1163 16.3182L31.371 21.2536H20.6393L22.8958 16.3147C23.0968 15.8528 22.8983 15.3028 22.4538 15.0877C22.0093 14.8729 21.4709 15.0671 21.2523 15.5243L18.6339 21.2561L14.9287 21.2565C14.6434 21.2508 14.3695 21.3823 14.1934 21.6124C14.0149 21.846 13.9551 22.1574 14.0342 22.4461L16.9445 32.8897C17.1976 33.7796 17.7336 34.5764 18.4533 35.1329C19.1733 35.6896 20.0664 35.9979 20.9678 36H31.045C31.9471 35.9968 32.8405 35.6872 33.5609 35.1275C34.2813 34.5682 34.8162 33.7683 35.0673 32.8744L37.9665 22.4426C38.0446 22.156 37.9845 21.8456 37.8059 21.6124Z" fill="white"/>
                                    </g>
                                    </svg>

                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <?php get_template_part('flexible-content/components/nav.php'); ?>