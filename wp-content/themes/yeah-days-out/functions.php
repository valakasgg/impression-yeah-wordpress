<?php 
// Scripts and Styles
function load_external_jQuery()
{
    // If not in admin dashboard
    if (!is_admin()) {
        // Deregister jQuery that is included with WordPress
        wp_deregister_script('jquery');
        // Check to make sure Google's library is available
        wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js');

        $link = 'http://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js';
        $try_url = @fopen($link, 'r');
        if ($try_url !== false) {
            // If it's available, get it registered
            wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js');
        } else {
            // Register the local file if CDN fails
            wp_register_script('jquery', get_template_directory_uri() . '/js/vendor/jquery.js', __FILE__, false, '2.1.4', true);
        }
        // Get it enqueued
        wp_enqueue_script('jquery');

        // Modernizr
		// wp_enqueue_script('modernizr', get_template_directory_uri() . '/assets/dist/js/custom.modernizr.js', array( 'jquery' ), '', false );
		
		// Bootstrap
		// wp_enqueue_script( 'bootstrap', '//cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js', array( 'jquery' ), '', true );
		// wp_enqueue_style( 'bootstrap', '//cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css' );
		
		// AOS
		// wp_enqueue_script( 'aos', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array( 'jquery' ), '', true );
		// wp_enqueue_style( 'aos', 'https://unpkg.com/aos@2.3.1/dist/aos.css' );

        // Swiper js
		// wp_enqueue_script( 'swiper', '//cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.4/swiper-bundle.min.js', array( 'jquery' ), '', true );
		// wp_enqueue_style( 'swiper', '//cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.4/swiper-bundle.css' );

        // Anime js
		// wp_enqueue_script( 'anime', 'https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js', array(), '', true );
		// wp_enqueue_style( 'anime', '//cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.js' );

        // Font Awesome
        // wp_enqueue_style( 'fa', 'https://kit.fontawesome.com/42a1713869.js', array(), '', true  );
        //<script src="https://kit.fontawesome.com/42a1713869.js" crossorigin="anonymous"></script>

        // Adding scripts file in the footer
		wp_enqueue_script( 'site-js', get_template_directory_uri() . '/assets/dist/js/main.min.js', array( 'jquery' ), '', true );

		// Register main stylesheet
		wp_enqueue_style( 'site-css', get_template_directory_uri() . '/assets/dist/css/main.css', array(), '', 'all' );
    }
}
add_action('wp_enqueue_scripts', 'load_external_jQuery', 1);
  
// Disable Gutenberg on the back end.
add_filter( 'use_block_editor_for_post', '__return_false' );

// Disable Gutenberg for widgets.
add_filter( 'use_widgets_blog_editor', '__return_false' );

add_action( 'wp_enqueue_scripts', function() {
    // Remove CSS on the front end.
    wp_dequeue_style( 'wp-block-library' );

    // Remove Gutenberg theme.
    wp_dequeue_style( 'wp-block-library-theme' );

    // Remove inline global CSS on the front end.
    wp_dequeue_style( 'global-styles' );
}, 20 );

add_action('wp_enqueue_scripts', 'load_external_jQuery', 1);

function register_my_menus()
{
    register_nav_menus(
        array(
            'mobile' => __('Mobile Menu'),
            'primary' => __('Primary Menu'),
            'footer' => __('Footer Menu'),
        )
    );
}
add_action('init', 'register_my_menus');

// Image Thumbnails
add_image_size('hero-image', 2000, 1040, true);
add_image_size('hero-image-mobile', 750, 1200, true);
add_image_size('logo-custom', 259, 230, true); // hard crop mode*/
add_image_size('square-custom', 400, 400, true); // hard crop mode*/

if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title'     => 'Theme Settings',
        'menu_title'    => 'Global Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'        => false
    ));
}

/**
 * Impression Theme edits.
 */
// require get_template_directory() . '/flexible-content/config.php';

function my_mce4_options($init)
{

    $custom_colours = '
        "FFFFFF", "White",
		"b01674", "Pink 1",
        "b21d81", "Pink 2",
        "782d70", "Pink 3",
        "2a2045", "Purple",
        "f8a501", "Orange",
        "001f5f", "Blue",
        "45c6b0", "Turquoise"
    ';

    // build colour grid default+custom colors
    $init['textcolor_map'] = '[' . $custom_colours . ']';

    // change the number of rows in the grid if the number of colors changes
    // 8 swatches per row
    $init['textcolor_rows'] = 1;

    return $init;
}
add_filter('tiny_mce_before_init', 'my_mce4_options');

function my_mce_before_init_insert_formats($init_array)
{
    // Define the style_formats array
    $style_formats = array(
        // Each array child is a format with it's own settings
        array(
            'title' => 'Uppercase',
            'inline' => 'span',
            'classes' => 'uppercase'
        ),
        array(
            'title' => 'Button Pink',
            'inline' => 'a',
            'classes' => 'button button--pink'
        ),
        array(
            'title' => 'Button White',
            'inline' => 'a',
            'classes' => 'button button--white'
        ),
    );
    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats'] = json_encode($style_formats);
    return $init_array;
}

// Attach callback to 'tiny_mce_before_init' 
add_filter('tiny_mce_before_init', 'my_mce_before_init_insert_formats');

add_action('admin_init', 'remove_textarea');

function remove_textarea() {
        remove_post_type_support( 'page', 'editor' );
}


function customizer_remove_css_section( $wp_customize ) {	
    $wp_customize->remove_section( 'custom_css' );
}
add_action( 'customize_register', 'customizer_remove_css_section', 15 );
