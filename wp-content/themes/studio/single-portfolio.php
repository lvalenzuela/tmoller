<?php
/**
 * The custom portfolio post type single post template
 */

 /** Force full width content layout */
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

/** Remove the post info function */
remove_action( 'genesis_before_post_content', 'genesis_post_info' );

/** Remove the author box on single posts */
remove_action( 'genesis_after_post', 'genesis_do_author_box_single' );

/** Remove the post meta function */
remove_action( 'genesis_after_post_content', 'genesis_post_meta' );

/** Remove the comments template */
remove_action( 'genesis_after_post', 'genesis_get_comments_template' );

/** Remove the backtotop */
remove_action('genesis_before_footer', 'themedy_backtotop');

/** Remove the footer */
remove_action( 'genesis_footer', 'genesis_footer_markup_open', 5 );
remove_action( 'genesis_footer', 'genesis_do_footer' );
remove_action( 'genesis_footer', 'genesis_footer_markup_close', 15 );

/** Remove infinite scroll and backtotop action */
remove_action('wp_enqueue_scripts', 'themedy_load_styles');
remove_action('genesis_before_header', 'themedy_historyback');


/** GALLERY MESS */

add_action('genesis_after', 'escribe_en_body_despues');
function escribe_en_body_despues() {
?>
<script type='text/javascript'>
var display_menu_mode = false;
var idwrap = "wrap";
	function display_menu(){
		if(display_menu_mode == true){
			display_menu_mode = false;
			$("#"+idwrap).fadeIn(500);
			$("#"+idwrap).animate({opacity: 1, top: 33}, 500);
		} else {
			display_menu_mode = true;
			$("#"+idwrap).animate({opacity: 1, top: -278}, 500);
			$("#"+idwrap).fadeIn(500);
		}
		
	}

	appGlobal();
	display_menu();

	$("#"+idwrap).css('bottom','0');
	$("#"+idwrap).css('padding','0px');
	$("#"+idwrap).css('position','fixed');
	$("#"+idwrap).css('top','60px');
	$("#"+idwrap).css('width','100%');
	$("#"+idwrap).css('max-width','none');
	$("#"+idwrap).css('z-index','999');

	$('#display_menu').css('bottom','0');
	$('#display_menu').css('padding','0');
	$('#display_menu').css('position','fixed');
	$('#display_menu').css('top','0px');
	$('#display_menu').css('width','100%');
	$('#display_menu').css('max-width','none');
	$('#display_menu').css('z-index','99999');

	</script>
	<?php
}

add_action('genesis_before', 'escribe_en_body');
function escribe_en_body() {
	global $post, $wp_locale;
   	static $instance = 0;
	$instance++;
	
	if (!isset($atts)) {
		$atts = array();
	}

    extract(shortcode_atts(array(
        'orderby' => 'menu_order ASC',
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


	<div id="display_menu" style="color:white;font-size:18px;height:10px;"><a href="javascript:display_menu();"><img src="<?php echo CHILD_URL.'/images/'; ?>btn-top.png"></a></div>

	<div id="loading-portfolio"></div>

	<div class="portfolio_images">
		<?php $indexDivId = 0; ?>
		<?php foreach( $attachments as $attachment ): ?>
		<div class="portfolio_image" id="portfolio_<?php echo $indexDivId; ?>"><?php echo $attachment->post_excerpt; ?></div>
		<?php $indexDivId = $indexDivId + 1; ?>
		<?php endforeach; ?>
	</div>

<style>
html.loading-portfolio {
	height: 100% !important;
	overflow: hidden;
}
#loading-portfolio {
	background: white url(<?php echo CHILD_URL.'/images/'; ?>loading.gif) no-repeat center center;
	position: absolute;
	top: 0; left: 0;
	width: 100%; height: 100%;
	z-index: 1000;
}
a:link {
	color:white;
}
.portfolio_images {
	width: 100%; height: 100%;
}
.portfolio_images .portfolio_image {
	box-shadow: 1px 1px 20px #000;
	position: relative;
	overflow: hidden;
	width: 100%; height: 100%;
}
.portfolio_images .portfolio_image.fixed {
	position: fixed;
	top: 0; left: 0;
	z-index: 0;
}
</style>

	
	<?php
}


/** Replace Standard WordPress Gallery Code -START */
	remove_shortcode('gallery');
	add_shortcode('gallery', 'child_gallery_shortcode');

	function child_gallery_shortcode( $attr ) {
	    global $post, $wp_locale;
	   	static $instance = 0;
		$instance++;
		
		if (!isset($atts)) {
			$atts = array();
		}
		
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
	        'captiontag' => 'div',
	        'orderby' => $orderby
	        ); 
	   	
	   	$attachments = array();
		$attachments = get_posts($args);

		?>


<script>

function appGlobal(){

var arrayImages = new Array();
<?php $indexDivId = 0; ?>
<?php $arrayImgJS = ""; ?>
<?php foreach( $attachments as $attachment ): ?>
<?php //$arrayImgJS .= " arrayImages['brady_".$indexDivId."'] = '".wp_get_attachment_url( $attachment->ID )."';\n"; ?>
<?php $arrayImgJS .= " arrayImages['portfolio_".$indexDivId."'] = '".wp_get_attachment_url( $attachment->ID )."';\n"; ?>
<?php $indexDivId = $indexDivId + 1; ?>
<?php endforeach; ?>
<?php echo substr($arrayImgJS, 0, -1)."\n"; ?>
		
(function(a){a.backstretch=function(b,c,d){function p(b){try{n={left:0,top:0};k=rootElement.width();l=k/i;if(l>=rootElement.height()){m=(l-rootElement.height())/2;if(g.centeredY)a.extend(n,{top:"-"+m+"px"})}else{l=rootElement.height();k=l*i;m=(k-rootElement.width())/2;if(g.centeredX)a.extend(n,{left:"-"+m+"px"})}a(".backstretch, .backstretch img").width(k).height(l).filter("img").css(n)}catch(c){}if(typeof b=="function")b()}function o(){if(b){var c;if(f.length==0){f=a("<div />").attr("class","backstretch").css({left:0,top:0,position:g.positionType,overflow:"hidden",zIndex:g.zIndex,margin:0,padding:0,height:"100%",width:"100%"})}else{f.find("img").addClass("deleteable")}c=a("<img />").css({position:"absolute",display:"none",margin:0,padding:0,border:"none",zIndex:g.zIndex}).bind("load",function(b){var c=a(this),e,h;c.css({width:"auto",height:"auto"});e=this.width||a(b.target).width();h=this.height||a(b.target).height();i=e/h;p(function(){c.fadeIn(g.speed,function(){f.find(".deleteable").remove();if(typeof d=="function")d()})})}).appendTo(f);var e=a(g.target),h=g.injectUsingPrepend?"prepend":"append";if(e.is("*")&&e.find(".backstretch").length==0){e[h](f)}f.data("settings",g);c.attr("src",b);a(window).resize(p)}}var e={target:"body",injectUsingPrepend:false,positionType:"fixed",centeredX:true,centeredY:true,zIndex:"-999999",speed:0},f=a(".backstretch"),g=f.data("settings")||e,h=f.data("settings"),i,j,k,l,m,n;if(c&&typeof c=="object")a.extend(g,c);if(g.target=="body"){rootElement="onorientationchange"in window?a(document):a(window)}else{rootElement=a(g.target)}a(document).ready(o);return this}})(jQuery);

var $scroll;
(function($) {
	var $Window = $(window),
		$height = $Window.height(),
		//$Images = $(".images .image"),
		$Images = $(".portfolio_images .portfolio_image"),
		//$tagline = $("#wrap"),
		$tagline = $("#display_menu"),
		$directions = $(".middle small"),
		_current = 0;
	// Loop through each image and set up scroll events.
	$Images.each(function(index){
		var $this = $(this);
		var $ID = $this.attr("id");
		// Set up scalable background image.
		//alert(arrayImages[$ID]);
		$.backstretch(arrayImages[$ID], {
			'target': "#" + $ID,
			'speed': 500,
			'positionType': 'absolute',
			'zIndex': 0
		});
		// Adjust the height initially.
		$this.css({height: $height});
		
		//alert("iPad|iPhone|Android :: " + (/iPad|iPhone|Android/i.test(navigator.userAgent)));
		
		/*Animacion de Scrolling eliminada por petición de Teresa Moller */
		/**
		if (!(/iPad|iPhone|Android/i.test(navigator.userAgent))) {
			// Add fixed class on scroll when object hits top.
			$Window.scroll(function(){
				var scrollTop = $(this).scrollTop();
				var $height = $this.height();
				if (scrollTop >= ($height * index) && index + 1	 < $Images.length) {
					$this.addClass("fixed").css({marginTop:0});
					_current = index;
				} else {
					$this.removeClass("fixed").css({marginTop:($height * index), zIndex: index});
				}
				if (index == 0) {
					//$tagline.css({marginTop: (scrollTop / 3)})
				}
			});
		} else {
			$Window.scroll(function(){
				var scrollTop = $(this).scrollTop();
				var $height = $this.height();
				if (scrollTop >= ($height * index) && index + 1	 < $Images.length) {
					$this.addClass("fixed").css({marginTop:0});
					_current = index;
				} else {
					$this.removeClass("fixed").css({marginTop:($height * index), zIndex: index});
				}
				if (index == 0) {
					//$tagline.css({marginTop: (scrollTop / 3)})
				}
			});
		}
		*/
	});
	// On Window Resize
	$Window.resize(function(){
		$height = $Window.height();
		$Images.css({height: $height + "px"});
	});
	// Catch down and up arrow press.
	$(document).keydown(function(e){
		if (e.keyCode == 40) {
			e.preventDefault();
			$scroll.next();
		}
		if (e.keyCode == 38) {
			e.preventDefault();
			$scroll.prev();
		}
	});
	// Scroll Animation
	$scroll = {
		next : function(){
			var next = (_current < ($Images.length - 1) ? (_current + 1) : ($Images.length) - 1);
			$("html,body").animate({scrollTop: $height * next }, 500);
		},
		prev: function() {
			var prev = (_current > 0 ? (_current - 1) : 0);
			$("html,body").animate({scrollTop: $height * prev}, 500);
		}
	};
	
	// Press Section
	/*$(".nav #press").click(function(e){
		e.preventDefault();
		if ($(this).hasClass("opened")) {
			$(".content").animate({opacity: 0, top: -20}, 500);
			$tagline.fadeIn(500);
		} else {
			$tagline.fadeOut(500);
			$(".content").animate({opacity: 1, top: 0}, 500);
		}
		$(this).toggleClass("opened");
	});
	$("#close").click(function(e){
		e.preventDefault();
		$tagline.fadeIn(500);
		$(".content").animate({opacity: 0, top: -20}, 500);
		$(".nav #press").toggleClass("opened");
	});*/
	// When everything finishes loading.
	
	$Window.load(function(){
		setTimeout(function(){		
			$("html").removeClass("loading-portfolio");
			$("#loading-portfolio").fadeOut(500);
			// Fade directions in and out then out.
			setTimeout(function(){
				$directions.fadeIn(1000, function(){
					$directions.animate({opacity: 0.1}, 1000, function(){
						$directions.animate({opacity:1}, 1000, function(){
							$directions.animate({opacity: 0.1}, 1000, function(){
								$directions.animate({opacity:1}, 1000, function(){
									$directions.animate({opacity: 0.1}, 1000, function(){
										$directions.animate({opacity:1}, 1000, function(){
											$directions.fadeOut(1000);
										});
									});
								});
							});
						});
					});
				});
			}, 1000);
		}, 2000);
	});
	
})(jQuery);
$(document).ready(function(){
	$(this).scrollTop(0);
});

}

//alert('<?php echo $_SERVER['HTTP_HOST']; ?>');

</script>
		<?php
		}

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