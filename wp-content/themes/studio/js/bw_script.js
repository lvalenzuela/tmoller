/*====================================

	PLUGINS
 
 ===================================*/

/*
 * jQuery Backstretch
 * Version 1.3
 * http://srobbin.com/jquery-plugins/jquery-backstretch/
 * http://github.com/colorjar/jquery-backstretch/
 *
 * Add a dynamically-resized background image to the page
 *
 * This is a fork of SRobbin's original 1.2.2 script.
 * It includes additional options and the ability to apply
 * the backstretch to multiple DIV containers, instead of
 * only the BODY of a page.
 *
 * ColorJar Author
 * Tim Novinger | http://github.com/timnovinger
 *
 * Copyright (c) 2011 Scott Robbin (srobbin.com)
 * Dual licensed under the MIT and GPL licenses.
*/

(function(a){a.backstretch=function(b,c,d){function p(b){try{n={left:0,top:0};k=rootElement.width();l=k/i;if(l>=rootElement.height()){m=(l-rootElement.height())/2;if(g.centeredY)a.extend(n,{top:"-"+m+"px"})}else{l=rootElement.height();k=l*i;m=(k-rootElement.width())/2;if(g.centeredX)a.extend(n,{left:"-"+m+"px"})}a(".backstretch, .backstretch img").width(k).height(l).filter("img").css(n)}catch(c){}if(typeof b=="function")b()}function o(){if(b){var c;if(f.length==0){f=a("<div />").attr("class","backstretch").css({left:0,top:0,position:g.positionType,overflow:"hidden",zIndex:g.zIndex,margin:0,padding:0,height:"100%",width:"100%"})}else{f.find("img").addClass("deleteable")}c=a("<img />").css({position:"absolute",display:"none",margin:0,padding:0,border:"none",zIndex:g.zIndex}).bind("load",function(b){var c=a(this),e,h;c.css({width:"auto",height:"auto"});e=this.width||a(b.target).width();h=this.height||a(b.target).height();i=e/h;p(function(){c.fadeIn(g.speed,function(){f.find(".deleteable").remove();if(typeof d=="function")d()})})}).appendTo(f);var e=a(g.target),h=g.injectUsingPrepend?"prepend":"append";if(e.is("*")&&e.find(".backstretch").length==0){e[h](f)}f.data("settings",g);c.attr("src",b);a(window).resize(p)}}var e={target:"body",injectUsingPrepend:false,positionType:"fixed",centeredX:true,centeredY:true,zIndex:"-999999",speed:0},f=a(".backstretch"),g=f.data("settings")||e,h=f.data("settings"),i,j,k,l,m,n;if(c&&typeof c=="object")a.extend(g,c);if(g.target=="body"){rootElement="onorientationchange"in window?a(document):a(window)}else{rootElement=a(g.target)}a(document).ready(o);return this}})(jQuery);


/*====================================

	SCRIPT
 
 ===================================*/

var $scroll;

(function($) {

	var $Window = $(window),
		$height = $Window.height(),
		$Images = $(".images .image"),
		$tagline = $("h1"),
		$directions = $(".middle small"),
		_current = 0;
	
	
	
	// Loop through each image and set up scroll events.
	$Images.each(function(index){

		var $this = $(this);
		var $ID = $this.attr("id");
		
		// Set up scalable background image.
		$.backstretch("/images/background/" + $ID + ".jpg", {
			'target': "#" + $ID,
			'speed': 500,
			'positionType': 'absolute',
			'zIndex': 0
		});
		
		// Adjust the height initially.
		$this.css({height: $height});
		
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
					$tagline.css({marginTop: (scrollTop / 3)})
				}
			});
		
		}
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
		
	
	// When everything finishes loading.
	$Window.load(function(){
		setTimeout(function(){		
			$("html").removeClass("loading");
			$("#loading").fadeOut(500);
			
			
			
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
	