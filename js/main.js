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

	$(function(){
		main.init();
	});

	$(window).load(function(){
		main.loaded();
	});

	$(window).resize(function(){
	});

})(jQuery);
