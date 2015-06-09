<?php
/**
 * This file adds the Front-Page page template to the Studio theme.
 *
 * @author StudioPress
 * @package Stretch
 * @subpackage Customizations
 */

// Add custom body class to the head
add_filter( 'body_class', 'frontpage_add_body_class' );
function frontpage_add_body_class( $classes ) {
   $classes[] = 'frontpage';
   return $classes;
}

 /** Remove breadcrumbs */
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

 /** Force full width content layout */
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

/** Remove the post info function */
remove_action( 'genesis_before_post_title', 'genesis_post_info' );

/** Remove the author box on single posts */
remove_action( 'genesis_after_post', 'genesis_do_author_box_single' );

/** Remove the post meta function */
remove_action( 'genesis_after_post_content', 'genesis_post_meta' );

/** Remove the comments template */
remove_action( 'genesis_after_post', 'genesis_get_comments_template' );

/** Remove the backtotop */
remove_action('genesis_before_footer', 'themedy_backtotop');

/** Remove infinite scroll */
remove_action('genesis_footer_scripts', 'themedy_scroll_scripts');

/** Remove the footer */
remove_action( 'genesis_footer', 'genesis_footer_markup_open', 5 );
remove_action( 'genesis_footer', 'genesis_do_footer' );
remove_action( 'genesis_footer', 'genesis_footer_markup_close', 15 );

/** Remove infinite scroll and backtotop action */
remove_action('wp_enqueue_scripts', 'themedy_load_styles');

/** Remove history back button */
remove_action('genesis_before_header', 'themedy_historyback');

/** Stretch Slideshow*/
/** Load Backstretch script and prepare images for loading */
add_action('wp_enqueue_scripts', 'stretch_enqueue_scripts');
function stretch_enqueue_scripts() {
	wp_enqueue_script( 'stretch-backstretch', CHILD_URL. '/js/jquery.backstretch.min.js', array( 'jquery' ), '1.7.1', true );
}

add_action( 'genesis_after_header', 'stretch_set_background_image' );
function stretch_set_background_image($atts) {

	    global $post, $wp_locale;
	   	static $instance = 0;
		$instance++;

	    extract(shortcode_atts(array(
	        'orderby' => 'menu_order ASC, ID ASC',
	        'id' => $post->ID,
	        'itemtag' => 'div',
	        'icontag' => 'div',
	        'captiontag' => 'div',
	        'columns' => 1,
	        'size' => 'full',
	        'link' => 'file'
	    ), $atts));
	 
	    $args = array(
	        'post_type' => 'attachment',
	        'post_parent' => $id,
	        'numberposts' => -1,
	        'orderby' => $orderby
	        ); 
	   	
	   	$attachments = array();
		$attachments = get_posts($args);

		?>
		<script>
		jQuery(document).ready(function($) {
		    $("body").backstretch([
			<?php foreach(  $attachments as $attachment ): ?>
			"<?php echo wp_get_attachment_url( $attachment->ID ); ?>",
			<?php endforeach; ?>
			], {
		        fade: 6000,
		        duration: 8000
		    });
		});
		</script>
		<?php
}


/*
add_action( 'genesis_footer', 'empty_menu_toggler_links' );
function empty_menu_toggler_links() {
?>
	<script>
		var url = $('.toggler>a').attr('href');
		firstPart = url.substring(0, url.lastIndexOf('\/')+1);
		$('.toggler>a').attr('href', firstPart + "#");
	</script>
<?php
}
*/

/*
add_action( 'genesis_footer', 'main_menu_effect' );
function main_menu_effect() {
?>
	<script>
$(document).ready(function() {
  var par = $('ul.sub-menu');
  $(par).hide();

    $("li.toggler>a").click(function (e) {
      $("ul.sub-menu").slideToggle(150);
            e.preventDefault();
  });
     });

	</script>
<?php
}
*/

genesis();