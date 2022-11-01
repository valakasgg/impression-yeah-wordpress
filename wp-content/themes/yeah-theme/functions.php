<?php
//enables the use of wordpress ajax
add_action('wp_head', 'cms_ajaxurl');
function cms_ajaxurl() {
  echo '<script type="text/javascript">
          var ajaxurl = "' . admin_url('admin-ajax.php') . '";
        </script>';
}
// Scripts and Styles
function load_external_jQuery() {
	// If not in admin dashboard
	if (!is_admin()) {
		// Deregister jQuery that is included with WordPress
    	wp_deregister_script( 'jquery' );
		// Check to make sure Google's library is available
		// wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js');

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

		// Adding scripts file in the footer
		wp_enqueue_script( 'site-js', get_template_directory_uri() . '/assets/dist/js/app.js', array( 'jquery' ), '', true );

		 // Register main stylesheet
		wp_enqueue_style( 'site-css', get_template_directory_uri() . '/assets/dist/css/app.css', array(), '', 'all' );


	
	}
}
add_action('wp_enqueue_scripts', 'load_external_jQuery', 1 );

function register_my_menus() {
  register_nav_menus(
    array(
    	'mobile' => __( 'Mobile Menu' ),
    	'main1' => __( 'Main Menu 1' ),
    	'main2' => __( 'Main Menu 2' ),
		// 'footer' => __( 'Footer Menu' ),
    )
  );
}
add_action( 'init', 'register_my_menus' );



add_image_size( 'logo-custom', 260, 117, true ); // hard crop mode*/
add_image_size( 'product-custom', 275, 145, true ); // hard crop mode*/
add_image_size( 'manufacturer-custom', 160, 125, true ); // hard crop mode*/
add_image_size( 'hero-image', 1920, 900, true );
add_image_size( 'featured-image', 960, 700, true );
add_image_size( 'standard-image', 675, 755, true ); // hard crop mode*/
add_image_size( 'team-image', 235, 265, true ); // hard crop mode*/
add_image_size( 'article-preview', 398, 300, true ); // hard crop mode*/
add_image_size( 'product-page', 950, 575, true ); // hard crop mode*/
add_image_size( 'jumbotron', 1640, 575, true ); // hard crop mode*/
add_image_size( 'jumbotron-alt', 950, 574, true ); // hard crop mode*/
add_image_size( 'contact-map', 1920, 550, true ); // hard crop mode*/

add_image_size( 'industry-rectangle', 535, 310, true ); // hard crop mode*/


if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme Settings',
		'menu_title'	=> 'Global Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

}


// Borrowed from FoundationPress
class Top_Bar_Walker extends Walker_Nav_Menu {
	function display_element( $element, &$children_elements, $max_depth, $depth = 0, $args, &$output ) {
		$element->has_children = ! empty( $children_elements[ $element->ID ] );
		$element->classes[] = ( $element->current || $element->current_item_ancestor ) ? 'active' : '';
		$element->classes[] = ( $element->has_children && 1 !== $max_depth ) ? 'has-dropdown' : '';
		parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	}
	function start_el( &$output, $object, $depth = 0, $args = array(), $current_object_id = 0 ) {
		$item_html = '';
		parent::start_el( $item_html, $object, $depth, $args );
		$output .= ( 0 == $depth ) ? '' : '';
		$classes = empty( $object->classes ) ? array() : (array) $object->classes;
		if ( in_array( 'label', $classes ) ) {
			$output .= '';
			$item_html = preg_replace( '/<a[^>]*>(.*)<\/a>/iU', '<label>$1</label>', $item_html );
		}
	if ( in_array( 'divider', $classes ) ) {
		$item_html = preg_replace( '/<a[^>]*>( .* )<\/a>/iU', '', $item_html );
	}
		$output .= $item_html;
	}
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$output .= "\n<ul class=\"sub-menu dropdown\">\n";
	}
}
class Offcanvas_Walker extends Walker_Nav_Menu {
	function display_element( $element, &$children_elements, $max_depth, $depth = 0, $args, &$output ) {
		$element->has_children = ! empty( $children_elements[ $element->ID ] );
		$element->classes[] = ( $element->current || $element->current_item_ancestor ) ? 'active' : '';
		$element->classes[] = ( $element->has_children && 1 !== $max_depth ) ? 'has-submenu' : '';
		parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	}
	function start_el( &$output, $object, $depth = 0, $args = array(), $current_object_id = 0 ) {
		$item_html = '';
		parent::start_el( $item_html, $object, $depth, $args );
		$classes = empty( $object->classes ) ? array() : (array) $object->classes;
		if ( in_array( 'label', $classes ) ) {
			$item_html = preg_replace( '/<a[^>]*>(.*)<\/a>/iU', '<label>$1</label>', $item_html );
		}
		$output .= $item_html;
	}
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$output .= "\n<ul class=\"right-submenu\">\n<li class=\"back\"><a href=\"#\">". __( 'Back', 'jointstheme' ) ."</a></li>\n";
	}
}



		function the_breadcrumb() {
		        echo '<ul id="crumbs">';
		    if (!is_home()) {
		        echo '<li><a href="';
		        echo get_option('home');
		        echo '">';
		        echo 'Home';
		        echo "</a></li><span>|</span> ";
		        if (is_category() || is_single()) {
		            echo '<li>';
		            echo' </li><li>';
		            if (is_single()) {
		                echo "</li><li>";
										echo get_post_type();
										echo "</li> <span>|</span> <li>";
		                echo the_title();
		                echo '</li>';
										echo ' <span>|</span> ';
										echo '<a href="javascript:history.go(-1)" class="cta-underline">Go Back</a>';

		            }
		        } elseif (is_page()) {
								echo '<li>';
		            echo the_title();
		            echo '</li> <span>|</span> ';
								echo '<a href="javascript:history.go(-1)" class="cta-underline">Go Back</a>';
		        }
						elseif (is_tax()) {
								echo '<li>';
		            echo single_term_title();
		            echo '</li> <span>|</span> ';
								echo '<a href="javascript:history.go(-1)" class="cta-underline">Go Back</a>';
		        }
		    }
		    elseif (is_tag()) {single_tag_title();}
		    elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
		    elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
		    elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
		    elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
		    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
		    elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
		    echo '</ul>';
		}

add_filter('use_block_editor_for_post', '__return_false', 10);


add_action('init', 'init_remove_support',100);
function init_remove_support(){
    $post_type = 'digital_library';
    remove_post_type_support( $post_type, 'editor');
}


// Remove admin header MT on HTML
function remove_admin_login_header() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_admin_login_header');

function remove_editor() {
    if (isset($_GET['post'])) {
        $id = $_GET['post'];
        $template = get_post_meta($id, '_wp_page_template', true);
        switch ($template) {
            case 'page.php':
			case 'front-page.php':
            // the below removes 'editor' support for 'pages'
            // if you want to remove for posts or custom post types as well
            // add this line for posts:
            // remove_post_type_support('post', 'editor');
            // add this line for custom post types and replace 
            // custom-post-type-name with the name of post type:
            // remove_post_type_support('custom-post-type-name', 'editor');
            remove_post_type_support('page', 'editor');
            break;
            default :
            // Don't remove any other template.
            break;
        }
    }
}
add_action('init', 'remove_editor');


// Theme functions custom made

function aurora_heading_format($format, $heading, $color) {
	switch ($format) {
		case 'h1':
			$heading = '<h1 style="color: '.$color.';">'.$heading.'</h1>';
			break;
		case 'h2':
			$heading = '<h2 style="color: '.$color.';">'.$heading.'</h2>';
			break;
		case 'h3':
			$heading = '<h3 style="color: '.$color.';">'.$heading.'</h3>';
			break;
		case 'h4':
			$heading = '<h4 style="color: '.$color.';">'.$heading.'</h4>';
			break;
		case 'h5':
			$heading = '<h5 style="color: '.$color.';">'.$heading.'</h5>';
			break;
		case 'p':
			$heading = '<h5 style="color: '.$color.';">'.$heading.'</h5>';
			break;
	}

	echo $heading;
}

function aurora_content_edit($content, $color) {
	echo '<div style="color: '.$color.' !important;">';
	echo str_replace('<p>', '<p style="color: '.$color.';">', $content);
	echo '</div>';
}


function aurora_svg_format($pos) {
	switch ($pos) {
		case 'none':
			$class = '';
			break;
		case 'tl':
			$class = 'topLeft';
			break;
		case 'tr':
			$class = 'topRight';
			break;
		case 'bl':
			$class = 'bottomLeft';
			break;
		case 'br':
			$class = 'bottomRight';
			break;
	}

	echo $class;
}

add_theme_support( 'post-thumbnails' );


function filter_wpseo_breadcrumb_separator($this_options_breadcrumbs_sep) {
    return '<i class="fas fa-chevron-right"></i>';
};


/**
 * Remove the content editor from ALL pages 
 */

add_action('admin_head', 'remove_content_editor');

function remove_content_editor()
{ 
    remove_post_type_support('page', 'editor');        
    remove_post_type_support('post', 'editor');
	add_post_type_support( 'post', 'excerpt' );     
	add_post_type_support( 'page', 'excerpt' );     
}

add_post_type_support( 'page', 'excerpt' );   

// CPT

// Register Custom Post Type
function case_studies_cpt() {

	$labels = array(
		'name'                  => _x( 'Case Studies', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Case Study', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Case Studies', 'text_domain' ),
		'name_admin_bar'        => __( 'Case Study', 'text_domain' ),
		'archives'              => __( 'Case Study Archives', 'text_domain' ),
		'attributes'            => __( 'Case Study Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Case Study:', 'text_domain' ),
		'all_items'             => __( 'All Case Studies', 'text_domain' ),
		'add_new_item'          => __( 'Add New Case Study', 'text_domain' ),
		'add_new'               => __( 'Add New Case Study', 'text_domain' ),
		'new_item'              => __( 'New Case Study', 'text_domain' ),
		'edit_item'             => __( 'Edit Case Study', 'text_domain' ),
		'update_item'           => __( 'Update Case Study', 'text_domain' ),
		'view_item'             => __( 'View Case Study', 'text_domain' ),
		'view_items'            => __( 'View Case Studies', 'text_domain' ),
		'search_items'          => __( 'Search Case Study', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Case Studies', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Case Studies list', 'text_domain' ),
		'items_list_navigation' => __( 'Case Studies list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Case Studies list', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                  => 'case_study',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Case Study', 'text_domain' ),
		'description'           => __( 'Ductec Case Studies', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail', 'custom-fields', 'excerpt' ),
		// 'taxonomies'            => array( 'category', 'post_tag' ),
		'taxonomies'            => array(),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-format-gallery',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		// 'has_archive'           => 'case_studys',
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite' => ['with_front' => false],
		'capability_type'       => 'page',
	);
	register_post_type( 'case-study', $args );

}
add_action( 'init', 'case_studies_cpt', 0 );

// Register Custom Post Type
// function services_cpt() {

// 	$labels = array(
// 		'name'                  => _x( 'Services', 'Post Type General Name', 'text_domain' ),
// 		'singular_name'         => _x( 'Service', 'Post Type Singular Name', 'text_domain' ),
// 		'menu_name'             => __( 'Services', 'text_domain' ),
// 		'name_admin_bar'        => __( 'Service', 'text_domain' ),
// 		'archives'              => __( 'Service Archives', 'text_domain' ),
// 		'attributes'            => __( 'Service Attributes', 'text_domain' ),
// 		'parent_item_colon'     => __( 'Parent Service:', 'text_domain' ),
// 		'all_items'             => __( 'All Services', 'text_domain' ),
// 		'add_new_item'          => __( 'Add New Service', 'text_domain' ),
// 		'add_new'               => __( 'Add New Service', 'text_domain' ),
// 		'new_item'              => __( 'New Service', 'text_domain' ),
// 		'edit_item'             => __( 'Edit Service', 'text_domain' ),
// 		'update_item'           => __( 'Update Service', 'text_domain' ),
// 		'view_item'             => __( 'View Service', 'text_domain' ),
// 		'view_items'            => __( 'View Services', 'text_domain' ),
// 		'search_items'          => __( 'Search Service', 'text_domain' ),
// 		'not_found'             => __( 'Not found', 'text_domain' ),
// 		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
// 		'featured_image'        => __( 'Featured Image', 'text_domain' ),
// 		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
// 		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
// 		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
// 		'insert_into_item'      => __( 'Insert into Services', 'text_domain' ),
// 		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
// 		'items_list'            => __( 'Services list', 'text_domain' ),
// 		'items_list_navigation' => __( 'Services list navigation', 'text_domain' ),
// 		'filter_items_list'     => __( 'Filter Services list', 'text_domain' ),
// 	);
// 	$rewrite = array(
// 		'slug'                  => 'service',
// 		'with_front'            => true,
// 		'pages'                 => true,
// 		'feeds'                 => true,
// 	);
// 	$args = array(
// 		'label'                 => __( 'Service', 'text_domain' ),
// 		'description'           => __( 'Ductec Services', 'text_domain' ),
// 		'labels'                => $labels,
// 		'supports'              => array( 'title', 'thumbnail', 'custom-fields' ),
// 		// 'taxonomies'            => array( 'category', 'post_tag' ),
// 		'taxonomies'            => array(),
// 		'hierarchical'          => false,
// 		'public'                => true,
// 		'show_ui'               => true,
// 		'show_in_menu'          => true,
// 		'menu_position'         => 5,
// 		'menu_icon'             => 'dashicons-screenoptions',
// 		'show_in_admin_bar'     => true,
// 		'show_in_nav_menus'     => true,
// 		'can_export'            => true,
// 		// 'has_archive'           => 'services',
// 		'has_archive'           => false,
// 		'exclude_from_search'   => false,
// 		'publicly_queryable'    => true,
// 		'rewrite' => ['with_front' => false],
// 		'capability_type'       => 'page',
// 	);
// 	register_post_type( 'services', $args );

// }
// add_action( 'init', 'services_cpt', 0 );

// Register Custom Post Type
function testimonials_cpt() {

	$labels = array(
		'name'                  => _x( 'Testimonials', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Testimonial', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Testimonials', 'text_domain' ),
		'name_admin_bar'        => __( 'Testimonial', 'text_domain' ),
		'archives'              => __( 'Testimonial Archives', 'text_domain' ),
		'attributes'            => __( 'Testimonial Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Testimonial:', 'text_domain' ),
		'all_items'             => __( 'All Testimonials', 'text_domain' ),
		'add_new_item'          => __( 'Add New Testimonial', 'text_domain' ),
		'add_new'               => __( 'Add New Testimonial', 'text_domain' ),
		'new_item'              => __( 'New Testimonial', 'text_domain' ),
		'edit_item'             => __( 'Edit Testimonial', 'text_domain' ),
		'update_item'           => __( 'Update Testimonial', 'text_domain' ),
		'view_item'             => __( 'View Testimonial', 'text_domain' ),
		'view_items'            => __( 'View Testimonials', 'text_domain' ),
		'search_items'          => __( 'Search Testimonial', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Testimonials', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Testimonials list', 'text_domain' ),
		'items_list_navigation' => __( 'Testimonials list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Testimonials list', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                  => 'testimonial',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Testimonial', 'text_domain' ),
		'description'           => __( 'Charge Your Vehicles Testimonials', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail', 'custom-fields', 'editor' ),
		// 'taxonomies'            => array( 'category', 'post_tag' ),
		'taxonomies'            => array(),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-groups',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		// 'has_archive'           => 'testimonials',
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => false,
		'rewrite'               => array(),
		'capability_type'       => 'page',
	);
	register_post_type( 'testimonials', $args );

}
add_action( 'init', 'testimonials_cpt', 0 );








/*
 * Callback function to filter the MCE settings
 */

// Callback function to insert 'styleselect' into the $buttons array
function my_mce_buttons_2($buttons) {
    array_unshift($buttons, 'styleselect');
    return $buttons;
}

// Register our callback to the appropriate filter
add_filter('mce_buttons_2', 'my_mce_buttons_2');

function my_mce_before_init_insert_formats($init_array) {
// Define the style_formats array
    $style_formats = array(
        // Each array child is a format with it's own settings
        array(
            'title' => 'Border Top',
            'inline' => 'span',
            'classes' => 'border-top-turq'
        ),
		array(
            'title' => 'Border Bottom',
            'inline' => 'span',
            'classes' => 'border-bottom-turq'
        ),
		array(
            'title' => 'Highlight Text',
            'inline' => 'span',
            'classes' => 'highlight'
        ),
		array(
            'title' => 'Strapline Spacing',
            'inline' => 'span',
            'classes' => 'strapline'
        ),
    );
    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats'] = json_encode($style_formats);
    return $init_array;
}

// Attach callback to 'tiny_mce_before_init' 
add_filter('tiny_mce_before_init', 'my_mce_before_init_insert_formats');


function my_theme_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'init', 'my_theme_add_editor_styles' );

function my_mce4_options($init) {

    $custom_colours = '
        "000000", "Black",
        "FFFFFF", "White",
		"092F57", "Blue",
        "4ABCC8", "turquoise"
    ';

    // build colour grid default+custom colors
    $init['textcolor_map'] = '['.$custom_colours.']';

    // change the number of rows in the grid if the number of colors changes
    // 8 swatches per row
    $init['textcolor_rows'] = 1;

    return $init;
}
add_filter('tiny_mce_before_init', 'my_mce4_options');