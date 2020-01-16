/* code javascript associé au thème machin  */
jQuery(document).ready(function($) { 


/* *************************************************************  */
/*         carousel page d'acceuil avec animation                 */
/* *************************************************************  */
	if(document.getElementById("slider-01")) {

		var $myCarousel = $('.carousel');

		// starts the carousel
		$myCarousel.carousel({
			interval: 5000
		});

		$myCarousel.on('slide.bs.carousel', function (e) {   
			var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
			doAnimations($animatingElems);
		});

		var $firstAnimatedElement = $myCarousel.find(".carousel-item:first").find("[data-animation ^= 'animated']");	

		doAnimations($firstAnimatedElement);


		function doAnimations(elems)  {
			var animEndEv = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';	
			elems.each(function() {
				var $this = $(this);
				$animationType = $this.data('animation');
				$this.addClass($animationType).one(animEndEv, function() {
					$this.removeClass($animationType);
				});
			});  // fin du each
		}	// doAnimations	

	}  // fin document.getElementById  pour slider-01




/* *************************************************************  */
/*            ajustement des images avec caption                  */
/* *************************************************************  */
	if(document.getElementById('can-have-caption'))  {

		var imageSet = $("#can-have-caption .wp-caption img");

		imageSet.each(function(index, elem) {
		$this = $(this);
		var realWidth = $this.attr('width');

		var cssWidth = realWidth + 'px';
		$this.parent().css('max-width', cssWidth);

		});

	}  // /if #can-have-caption


});  // fin du ready