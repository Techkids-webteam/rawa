$(document).ready(function() {
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
	$('#random-list').masonry({
		itemSelector: '.student-item',
		columnWidth: '.student-item',
		percentPosition: true
	});
})