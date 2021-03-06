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
//(function(e,t,n){"use strict";e.fn.backstretch=function(r,s){return(r===n||r.length===0)&&e.error("No images were supplied for Backstretch"),e(t).scrollTop()===0&&t.scrollTo(0,0),this.each(function(){var t=e(this),n=t.data("backstretch");n&&(s=e.extend(n.options,s),n.destroy(!0)),n=new i(this,r,s),t.data("backstretch",n)})},e.backstretch=function(t,n){return e("body").backstretch(t,n).data("backstretch")},e.expr[":"].backstretch=function(t){return e(t).data("backstretch")!==n},e.fn.backstretch.defaults={centeredX:!0,centeredY:!0,duration:5e3,fade:0};var r={wrap:{left:0,top:0,overflow:"hidden",margin:0,padding:0,height:"100%",width:"100%",zIndex:-999999},img:{position:"absolute",display:"none",margin:0,padding:0,border:"none",width:"auto",height:"auto",maxWidth:"none",zIndex:-999999}},i=function(n,i,o){this.options=e.extend({},e.fn.backstretch.defaults,o||{}),this.images=e.isArray(i)?i:[i],e.each(this.images,function(){e("<img />")[0].src=this}),this.isBody=n===document.body,this.$container=e(n),this.$wrap=e('<div class="backstretch"></div>').css(r.wrap).appendTo(this.$container),this.$root=this.isBody?s?e(t):e(document):this.$container;if(!this.isBody){var u=this.$container.css("position"),a=this.$container.css("zIndex");this.$container.css({position:u==="static"?"relative":u,zIndex:a==="auto"?0:a,background:"none"}),this.$wrap.css({zIndex:-999998})}this.$wrap.css({position:this.isBody&&s?"fixed":"absolute"}),this.index=0,this.show(this.index),e(t).on("resize.backstretch",e.proxy(this.resize,this)).on("orientationchange.backstretch",e.proxy(function(){this.isBody&&t.pageYOffset===0&&(t.scrollTo(0,1),this.resize())},this))};i.prototype={resize:function(){try{var e={left:0,top:0},n=this.isBody?this.$root.width():this.$root.innerWidth(),r=n,i=this.isBody?t.innerHeight?t.innerHeight:this.$root.height():this.$root.innerHeight(),s=r/this.$img.data("ratio"),o;s>=i?(o=(s-i)/2,this.options.centeredY&&(e.top="-"+o+"px")):(s=i,r=s*this.$img.data("ratio"),o=(r-n)/2,this.options.centeredX&&(e.left="-"+o+"px")),this.$wrap.css({width:n,height:i}).find("img:not(.deleteable)").css({width:r,height:s}).css(e)}catch(u){}return this},show:function(t){if(Math.abs(t)>this.images.length-1)return;this.index=t;var n=this,i=n.$wrap.find("img").addClass("deleteable"),s=e.Event("backstretch.show",{relatedTarget:n.$container[0]});return clearInterval(n.interval),n.$img=e("<img />").css(r.img).bind("load",function(t){var r=this.width||e(t.target).width(),o=this.height||e(t.target).height();e(this).data("ratio",r/o),e(this).fadeIn(n.options.speed||n.options.fade,function(){i.remove(),n.paused||n.cycle(),n.$container.trigger(s,n)}),n.resize()}).appendTo(n.$wrap),n.$img.attr("src",n.images[t]),n},next:function(){return this.show(this.index<this.images.length-1?this.index+1:0)},prev:function(){return this.show(this.index===0?this.images.length-1:this.index-1)},pause:function(){return this.paused=!0,this},resume:function(){return this.paused=!1,this.next(),this},cycle:function(){return this.images.length>1&&(clearInterval(this.interval),this.interval=setInterval(e.proxy(function(){this.paused||this.next()},this),this.options.duration)),this},destroy:function(n){e(t).off("resize.backstretch orientationchange.backstretch"),clearInterval(this.interval),n||this.$wrap.remove(),this.$container.removeData("backstretch")}};var s=function(){var e=navigator.userAgent,n=navigator.platform,r=e.match(/AppleWebKit\/([0-9]+)/),i=!!r&&r[1],s=e.match(/Fennec\/([0-9]+)/),o=!!s&&s[1],u=e.match(/Opera Mobi\/([0-9]+)/),a=!!u&&u[1],f=e.match(/MSIE ([0-9]+)/),l=!!f&&f[1];return!((n.indexOf("iPhone")>-1||n.indexOf("iPad")>-1||n.indexOf("iPod")>-1)&&i&&i<534||t.operamini&&{}.toString.call(t.operamini)==="[object OperaMini]"||u&&a<7458||e.indexOf("Android")>-1&&i&&i<533||o&&o<6||"palmGetResource"in t&&i&&i<534||e.indexOf("MeeGo")>-1&&e.indexOf("NokiaBrowser/8.5.0")>-1||l&&l<=6)}()})(jQuery,window);



/*====================================

	SCRIPT
 
 ===================================*/

var $scroll;

(function($) {

	var $Window = $(window),
		$height = $Window.height(),
		$Item = $(".gallery-item img"),
		//$Images = $(".images .image"),
		$Images = $(".gallery .gallery-item"),
		$tagline = $("h1"),
		$directions = $(".middle small"),
		_current = 0;
	
/*	
$(".gallery .gallery-item").each(function(index){
	$(".gallery-item img").each(function(index){
		$(this).attr("src");
		//console.log( "src" + ": " + $(this).attr("src") );
	});
});
*/
	
	// Loop through each image and set up scroll events.
	$Images.each(function(index){

		var $this = $(this);
		var $ID = $this.attr("id");
//		var $source = $Item.each(function(index){console.log($(this).attr("src"));});
//		var $source = $this.attr("src");
		
		// Set up scalable background image.
		$.backstretch(
//"http://tere.invisible.cl/wp-content/uploads/2013/01/" + $ID + ".jpg"
			//$source
		/*	*/
			/**
			[ "http://tere.invisible.cl/wp-content/uploads/2013/01/Portfolio-Lo-Curro-100.jpg"
			, "http://tere.invisible.cl/wp-content/uploads/2013/01/Portfolio-Lo-Curro-300.jpg"
			, "http://tere.invisible.cl/wp-content/uploads/2013/01/Portfolio-Lo-Curro-400.jpg"
			, "http://tere.invisible.cl/wp-content/uploads/2013/01/Portfolio-Lo-Curro-600.jpg"
			, "http://tere.invisible.cl/wp-content/uploads/2013/01/Portfolio-Lo-Curro-700.jpg"
			, "http://tere.invisible.cl/wp-content/uploads/2013/01/Portfolio-Lo-Curro-800.jpg"
			, "http://tere.invisible.cl/wp-content/uploads/2013/01/Portfolio-Lo-Curro-900.jpg"
			, "http://tere.invisible.cl/wp-content/uploads/2013/01/Portfolio-Lo-Curro-990.jpg"
			]
			**/
			/*"/images/background/" + $ID + ".jpg"*/
			"/wp-content/uploads/2013/01/lo_curro/" + $ID + ".jpg"
			, {
			'target': "#" + $ID,
			'speed': 500,
			'positionType': 'absolute',
			'zIndex': 0
		});
		
		// Adjust the height initially.
		$this.css({height: $height});
		//alert("Process ID :: " + $ID);
		if (!(/iPad|iPhone|Android/i.test(navigator.userAgent))) {
		
			// Add fixed class on scroll when object hits top.
			$Window.scroll(function(){
				var scrollTop = $(this).scrollTop();
				var $height = $this.height();
				
				if (scrollTop >= ($height * index) && index + 1	 < $Images.length) {
					//$this.addClass("fixed").css({marginTop:0});
					$this.addClass("fixed").css({marginTop:0,width:'100%'});
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
	/*
	// Press Section
	$(".nav #press").click(function(e){
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
		
	});
	*/
	
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

	