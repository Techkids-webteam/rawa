$(document).ready(function() {

	$('body').on('click', '.btn-rated', function(e){
		e.preventDefault();
		console.log(parent)
		$(this).toggleClass('active')
	})

	$('#top-list').slick({
		dots: false,
		infinite: false,
		speed: 300,
		slidesToShow: 3,
		slidesToScroll: 3,
		responsive: [
		{
	    	breakpoint: 768,
	    	settings: {
	    		slidesToShow: 1,
	    		slidesToScroll: 1,
				dots: true,
				arrows: false,
				infinite: true,
				speed: 300,
				appendDots: ".student-list-dots"
	      	}
	    }
	  ]
	});

	var $grid = $('#random-list').imagesLoaded( function() {
	  // init Masonry after all images have loaded
	  $grid.masonry({
		itemSelector: '.student-item',
		columnWidth: '.student-item',
		percentPosition: true
	  });
	});
})
