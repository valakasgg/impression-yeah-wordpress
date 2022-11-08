<?php
// Scripts and Styles
function load_external_jQuery() {
	// If not in admin dashboard
	if (!is_admin()) {
		
		// Deregister jQuery that is included with WordPress
    	wp_deregister_script( 'jquery' );
		
		// Check to make sure Google's library is available
		$link = 'http://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js';
		$try_url = @fopen($link,'r');
		
        if( $try_url !== false ) {
            // If it's available, get it registered
            wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js');
		} else {	
			// Register the local file if CDN fails
			wp_register_script('jquery', get_template_directory_uri().'/js/vendor/jquery.js', __FILE__, false, '2.1.4', true);	
		}
		
		// Get it enqueued 
		wp_enqueue_script('jquery');
		
		// Modernizr
		wp_enqueue_script('modernizr', get_template_directory_uri() . '/assets/js/vendor/custom.modernizr.js', array( 'jquery' ), '', false );
		
		// Bootstrap
		wp_enqueue_script( 'bootstrap', '//cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js', array( 'jquery' ), '', true );
		wp_enqueue_style( 'bootstrap', '//cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css' );
		
		// AOS
		wp_enqueue_script( 'aos', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array( 'jquery' ), '', true );
		wp_enqueue_style( 'aos', 'https://unpkg.com/aos@2.3.1/dist/aos.css' );

		// Slick Slider
		wp_enqueue_script( 'slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array( 'jquery' ), '', true );
		wp_enqueue_style( 'slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css' );

		// Adding scripts file in the footer
		wp_enqueue_script( 'site-js', get_template_directory_uri() . '/assets/js/main-dist.js', array( 'jquery' ), '', true );

		// Register main stylesheet
		wp_enqueue_style( 'site-css', get_template_directory_uri() . '/assets/css/main.css?v2', array(), '', 'all' );
	}
}
add_action('wp_enqueue_scripts', 'load_external_jQuery', 1 );

function register_my_menus() {
	register_nav_menus(
		array(
			'primary-menu' => __('Primary'),
			'footer-menu'  => __('Footer'),
		)
	);
}
add_action( 'init', 'register_my_menus' );


if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

// Add Thumbnail Theme Support
add_theme_support( 'post-thumbnails' );

// Remove Gutenberg
add_filter( 'use_block_editor_for_post', '__return_false', 10);
add_filter( 'use_block_editor_for_post_type', '__return_false', 10);

// WYSIWYG Colours
function my_mce4_options($init) {

    $custom_colours = '
        "F800BE", "Pink",
        "03F5ED", "Green",
        "7D00F8", "Purple",
        "AFAFAF", "Light Grey",
        "363636", "Grey",
        "2B2B2B", "Dark Grey",
    ';

    // build colour grid default+custom colors
    $init['textcolor_map'] = '['.$custom_colours.']';

    // change the number of rows in the grid if the number of colors changes
    // 8 swatches per row
    $init['textcolor_rows'] = 1;

    return $init;
}
add_filter('tiny_mce_before_init', 'my_mce4_options');

?>