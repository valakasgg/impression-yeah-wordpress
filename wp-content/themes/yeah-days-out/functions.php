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
		wp_enqueue_script( 'site-js', get_template_directory_uri() . '/impression-config/assets/dist/js/app.js', array( 'jquery' ), '', true );

		 // Register main stylesheet
		wp_enqueue_style( 'site-css', get_template_directory_uri() . '/impression-config/assets/dist/css/app.css', array(), '', 'all' );


	
	}
}
add_action('wp_enqueue_scripts', 'load_external_jQuery', 1 );

function register_my_menus() {
  register_nav_menus(
    array(
    	'mobile' => __( 'Mobile Menu' ),
    	'primary' => __( 'Primary Menu' ),
		'footer' => __( 'Footer Menu' ),
    )
  );
}
add_action( 'init', 'register_my_menus' );



add_image_size( 'hero-image', 2000, 1040, true );
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


/**
 * Impression Theme edits.
 */
require get_template_directory() . '/impression-config/config.php';

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


// add_action('init', 'init_remove_support',100);
// function init_remove_support(){
//     $post_type = 'digital_library';
//     remove_post_type_support( $post_type, 'editor');
// }


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

function filter_wpseo_breadcrumb_separator($this_options_breadcrumbs_sep) {
    return '<i class="fas fa-chevron-right"></i>';
};

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

function my_theme_add_editor_styles() {
    add_editor_style( 'wysiwyg.css.css' );
}
add_action( 'init', 'my_theme_add_editor_styles' );

function my_mce4_options($init) {

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
    $init['textcolor_map'] = '['.$custom_colours.']';

    // change the number of rows in the grid if the number of colors changes
    // 8 swatches per row
    $init['textcolor_rows'] = 1;

    return $init;
}
add_filter('tiny_mce_before_init', 'my_mce4_options');

function my_mce_before_init_insert_formats($init_array) {
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