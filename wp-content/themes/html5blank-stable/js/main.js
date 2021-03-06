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
	$('#random-list').imagesLoaded().progress( function() {
		$('#random-list').masonry('layout');
	});

	$('body').on('click', '#home_menu_button', function(){
		if($('#home_menu_button').hasClass('active')){
			$('#home_menu_button').removeClass('active');
			$('#home_menu_list').removeClass('active');
		}
		else{
			$('#home_menu_button').addClass('active');
			$('#home_menu_list').addClass('active');	
		}
	})
})
