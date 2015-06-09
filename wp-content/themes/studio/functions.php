<?php
/** Start the engine */
require_once( get_template_directory() . '/lib/init.php' );

/** Child theme (do not remove) */
define( 'CHILD_THEME_NAME', 'Studio Theme' );
define( 'CHILD_THEME_URL', 'http://'.$_SERVER['HTTP_HOST'] );

/** Add Viewport meta tag for mobile browsers */
add_action( 'genesis_meta', 'add_viewport_meta_tag' );
function add_viewport_meta_tag() {
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0"/>';
}

/**
 * Unregister Superfish Scripts.
 *
 * @author Brian Gardner
 * @link http://www.briangardner.com/code/unregister-superfish-scripts/
 */ 
// Unregister the superfish scripts
add_action( 'wp_enqueue_scripts', 'unregister_superfish' );
function unregister_superfish() {
	wp_dequeue_script( 'superfish' );
	wp_dequeue_script( 'superfish-args' );
}

add_action( 'wp_enqueue_scripts', 'script_managment', 99);
/**
 * Change the location of jQuery.
 *
 * @author Greg Rickaby
 * @since 1.0.0
 */
function script_managment() {
	  wp_deregister_script( 'jquery' );
	  wp_deregister_script( 'jquery-ui' );
	  wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js' );
	  wp_register_script( 'jquery-ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js' );
	  wp_enqueue_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js', array( 'jquery' ), '1.9.1' );
	  wp_enqueue_script( 'jquery-ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js', array( 'jquery' ), '1.10.2' );
}


/** Genesis Theme required - This loads before parent functions.php **/

/* Table of Contents

	01 WordPress Functions
		- Add support for image sizes
	02 Genesis Funcions
		- Switch Genesis Sidebars
		- Relocate Post Info
	03 Theme Funcions
		- Create additional color style options
		- Stretch background image
	04 Portfolio
	05 Miscellaneous

*/


/*
01 WordPress Functions
---------------------------------------------------------------------------------------------------- */

/** 01a - Add support for image sizes ----------- */

if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 194, 146 ); // default Post Thumbnail dimensions   
}

/** 01b - Add new image sizes */

add_image_size( 'portfolio', 330, 230, TRUE );

/** 01b - Add support for post formats ----------- */

// Add child-theme support for post formats
add_theme_support('post-formats', array('aside', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video', 'audio'));

// Remove Gallery Styling
// http://wpsnipp.com/index.php/functions-php/remove-inline-style-from-gallery-shortcode/
add_filter( 'use_default_gallery_style', '__return_false' );

// Re-attach library media
// http://wpsnipp.com/index.php/functions-php/re-attach-library-media/
add_filter("manage_upload_columns", 'upload_columns');
add_action("manage_media_custom_column", 'media_custom_columns', 0, 2);
function upload_columns($columns) {
    unset($columns['parent']);
    $columns['better_parent'] = "Parent";
    return $columns;
}
function media_custom_columns($column_name, $id) {
    $post = get_post($id);
    if($column_name != 'better_parent')
        return;
        if ( $post->post_parent > 0 ) {
            if ( get_post($post->post_parent) ) {
                $title =_draft_or_post_title($post->post_parent);
            }
            ?>
            <strong><a href="<?php echo get_edit_post_link( $post->post_parent ); ?>"><?php echo $title ?></a></strong>, <?php echo get_the_time(__('Y/m/d')); ?>
            <br />
            <a class="hide-if-no-js" onclick="findPosts.open('media[]','<?php echo $post->ID ?>');return false;" href="#the-list"><?php _e('Re-Attach'); ?></a>
            <?php
        } else {
            ?>
            <?php _e('(Unattached)'); ?><br />
            <a class="hide-if-no-js" onclick="findPosts.open('media[]','<?php echo $post->ID ?>');return false;" href="#the-list"><?php _e('Attach'); ?></a>
            <?php
        }
}

/*
02 Genesis Functions
---------------------------------------------------------------------------------------------------- */
//* Load custom favicon
add_filter( 'genesis_pre_load_favicon', 'custom_favicon_filter' );
function custom_favicon_filter( $favicon_url ) {
	return CHILD_URL.'/images/favicon.ico';
}

// Add support for Genesis post format images
add_theme_support('genesis-post-format-images');

/** 02a - Switch Genesis Sidebars ----------- */

add_action( 'genesis_after_header', 'be_change_sidebar_order' );
/**
 * Swap Primary and Secondary Sidebars on Sidebar-Sidebar-Content
 *
 * @author Bill Erickson
 * @link http://www.billerickson.net/switch-genesis-sidebars/
 */
function be_change_sidebar_order() {
 
    $site_layout = genesis_site_layout();
 
    if ( 'content-sidebar-sidebar' == $site_layout ) {
        // Remove the Primary Sidebar from the Primary Sidebar area.
        remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );
 
        // Remove the Secondary Sidebar from the Secondary Sidebar area.
        remove_action( 'genesis_sidebar_alt', 'genesis_do_sidebar_alt' );
 
        // Place the Secondary Sidebar into the Primary Sidebar area.
        add_action( 'genesis_sidebar', 'genesis_do_sidebar_alt' );
 
        // Place the Primary Sidebar into the Secondary Sidebar area.
        add_action( 'genesis_sidebar_alt', 'genesis_do_sidebar' );
    }
 
}

// Move image above post title
//remove_action( 'genesis_post_content', 'genesis_do_post_image' );
//add_action( 'genesis_before_post_title', 'genesis_do_post_image' );

/** 02b - Relocate Post Info ----------- */

/**
 * Post Info
 * Based on
 * @link http://my.studiopress.com/snippets/post-info/
 */
/** Relocate the post info and post meta functions */
remove_action( 'genesis_after_post_content', 'genesis_post_meta' );
add_action( 'genesis_before_post_content', 'genesis_post_meta' );

//remove_action( 'genesis_before_post_content', 'genesis_post_info' );
//add_action( 'genesis_before_post_title', 'genesis_post_info' );

/** Customize the post info function */
add_filter( 'genesis_post_info', 'post_info_filter' );
function post_info_filter($post_info) {
if (!is_page()) {
    $post_info = '[post_date]';
    return $post_info;
}} 

/** Customize the post meta function*/ 
add_filter( 'genesis_post_meta', 'post_meta_filter' );
function post_meta_filter($post_meta) {
if (!is_page()) {
    $post_meta = '[post_tags sep=", " before="TAGS<br/>"]';
    return $post_meta;
}}

/** Remove Footer */
remove_action( 'genesis_footer', 'genesis_do_footer' );


/*
03 Theme Functions
---------------------------------------------------------------------------------------------------- */

/** 03a - Create additional color style options ----------- */
add_theme_support( 'genesis-style-selector', array( 'theme-blue' => 'Blue', 'theme-green' => 'Green', 'theme-orange' => 'Orange', 'theme-red' => 'Red' ) );


/** 03c - Create portfolio custom post type ----------- */
add_action( 'init', 'portfolio_post_type' );
function portfolio_post_type() {
    register_post_type( 'portfolio',
        array(
            'labels' => array(
                'name' => __( 'Portfolio' ),
                'singular_name' => __( 'Portfolio' ),
            ),
            'exclude_from_search' => true,
            'has_archive' => true,
            'hierarchical' => true,
            'public' => true,
            'rewrite' => array( 'slug' => 'portfolio' ),
            'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes', 'genesis-seo' , 'post-formats' ),
        )
    );
}

/** 03d - Add Infinite Scroll Scripts */
/**
 * Add Infinite Scroll Scripts.
 *
 * @author Themedy
 * @link http://themedy.com/themes/tote/
 */

// Add our style (set in options panel)

add_action('wp_enqueue_scripts', 'themedy_load_styles');

function themedy_load_styles() {

	if (is_category( 'blog' )) {
		wp_enqueue_script('infinitescroll', CHILD_URL.'/js/jquery.infinitescroll.min.js', array('jquery'), '2.0b2.120519', FALSE);
	}
	
	wp_enqueue_script('backtotop', CHILD_URL.'/js/jquery.backtotop.js', array('jquery'), '1', TRUE);
}


//add_filter('genesis_footer_scripts', 'themedy_scroll_scripts');
function themedy_scroll_scripts() { 
	//if (is_category( 'blog' )) {
		?>
		
		<script type="text/javascript" src="<?php echo CHILD_URL.'/js/'; ?>jquery.infinitescroll.min.js" />
		
		<script type="text/javascript">
			

			jQuery(window).load(function() {
				jQuery('#content').infinitescroll({

					loading: {
						msgText		  	: "Loading more posts...",
						finishedMsg    	: "No more posts!" ,	
						img			   	: "<?php echo CHILD_URL.'/images/'; ?>loading.gif",
					},

					navSelector  	: "div.navigation",
					nextSelector 	: "div.navigation .alignleft a",
					itemSelector 	: "#content > div",
					debug		 	: false,
					extraScrollPx	: 400, 
					animate      	: false, 
					dataType	 	: 'html',
				});

				jQuery(document.body).addClass('infinitescroll');

			});

		</script>

		<?php

	//}

}


// History Back

add_action('genesis_before_header', 'themedy_historyback');

function themedy_historyback() {

	?>

	<div class="history-back-wrap">

		<p id="history-back">

			<a href="javascript:history.back()"><img src="<?php echo CHILD_URL.'/images/'; ?>btn-back.png"></a>

		</p>

	</div>

    <?php	

}

// Back To top

add_action('genesis_before_footer', 'themedy_backtotop');

function themedy_backtotop() {

	?>

	<div class="back-top-wrap">

		<p id="back-top">

			<a href="#wrap"><img src="<?php echo CHILD_URL.'/images/'; ?>btn-top.png"></a>

		</p>

	</div>

    <?php	

}


/*
04 Miscellaneous
---------------------------------------------------------------------------------------------------- */


if (is_file(CHILD_DIR.'/custom/custom_functions.php')) { include(CHILD_DIR.'/custom/custom_functions.php'); } // Include Custom Functions

define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS',true);


/*
05 Custom Shortcodes
---------------------------------------------------------------------------------------------------- */
add_shortcode('team_member','team_member_styling');
function team_member_styling($atts, $content = null){
	//Establece valores por defecto si no se entregan en el shortcode
	return '<div class="team-member">'. $content .'</div>';
}