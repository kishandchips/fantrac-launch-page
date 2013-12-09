;(function($) {

	window.main = {
		init: function(){

		},

		loaded: function(){
			this.setBoxSizing();
		},

		setBoxSizing: function(){
			if( $('html').hasClass('no-boxsizing') ){
		        $('.span:visible').each(function(){
		        	console.log($(this).attr('class'));
		        	var span = $(this);
		            var fullW = span.outerWidth(),
		                actualW = span.width(),
		                wDiff = fullW - actualW,
		                newW = actualW - wDiff;
		 			
		            span.css('width',newW);
		        });
		    }
		},

		resize: function(){
		}
	}

	equalheight = function(container){

	var currentTallest = 0,
	     currentRowStart = 0,
	     rowDivs = new Array(),
	     $el,
	     topPosition = 0;
	 $(container).each(function() {

	   $el = $(this);
	   $($el).height('auto')
	   topPostion = $el.position().top;

	   if (currentRowStart != topPostion) {
	     for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
	       rowDivs[currentDiv].height(currentTallest);
	     }
	     rowDivs.length = 0; // empty the array
	     currentRowStart = topPostion;
	     currentTallest = $el.height();
	     rowDivs.push($el);
	   } else {
	     rowDivs.push($el);
	     currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
	  }
	   for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
	     rowDivs[currentDiv].height(currentTallest);
	   }
	 });
	}

	$.fn.anchorAnimate = function(settings) {
	 	settings = jQuery.extend({
			speed : 1100
		}, settings);	
		
		return this.each(function(){
			var caller = this
			$(caller).click(function (event) {	
				event.preventDefault();
				var locationHref = window.location.href
				var elementClick = $(caller).attr("href")			
				var destination = $(elementClick).offset().top;
		

				$("html:not(:animated),body:not(:animated)").animate({ scrollTop: destination}, settings.speed, function() {
					// window.location.hash = elementClick;
				});
			  	return false;
			})
		})
	}		

	$(function(){
		main.init();
	});

	$(window).load(function(){
		main.loaded();
		$("a.scroll-to-btn").anchorAnimate();
	  	equalheight('.gfield_radio li');
	});

	$(window).resize(function(){
	  equalheight('.gfield_radio li');
	});	

	$(window).resize(function(){
	});

})(jQuery);
