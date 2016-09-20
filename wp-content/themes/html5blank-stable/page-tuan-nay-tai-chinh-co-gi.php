<?php get_header(); ?>
<div class="container-fluid banner news-banner">
	<h1><strong>SỰ KIỆN</strong> VÀ <strong>CƠ HỘI</strong></h1>
</div>
<script>
	used_post = [];
</script>
<div class="container">
	<ul class="timeline" id="timeline">
	<?php 
		$args = array(
			'posts_per_page'   => 2,
			'category'         => '3,4',
			'orderby'          => 'date',
			'order'            => 'DESC',
			'post_type'        => 'post',
			'post_status'      => 'publish',
			'suppress_filters' => true  
		);
		$lastposts = get_posts( $args );

		foreach ( $lastposts as $post ) :
			setup_postdata( $post ); 
			$category_detail=get_the_category( $post->ID );
			$cat =  $category_detail[0]->cat_ID;
		
	?>
		<script>used_post.push(<?php echo $post->ID ?>);</script>
		<li class="<?php if ($cat == 3) { echo "timeline-item";} else {echo "timeline-item-inverted clearfix";} ?>">
			<div class="timeline-badge">
			</div>
			<div class="row timeline-event-container">
				<div class="timeline-event">
					<div class="col-xs-8">
						<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
					</div>
					<div class="col-xs-4">
						<button class="btn btn-default 								
						<?php
								if(is_user_logged_in()){
									echo " btn-like";
								} else {
									echo " btn-none";
								}

								if(in_array($current_user->ID, get_post_meta(get_the_ID(), 'post_like', true))) {
									echo " active";
								};
								
								?>" data-id = "<?php the_ID();?>"><i class="fa fa-thumbs-up" aria-hidden="true"></i>
 <span class="like-count"><?php echo count(get_post_meta(get_the_ID(), 'post_like', true));?></span></button>
					</div> 
					<div class="col-xs-12">
						<?php the_post_thumbnail(); ?>
						<p>
							<?php 
							the_excerpt(); 
							$date = get_post_meta(get_the_ID(), 'event_date', true);
							$today = date("Y-m-d");
							$compare = strcmp($date, $today);
							$day_format = date_format(date_create($date), "d-m-Y");

							if ($cat == 3) {
								echo "<p><strong>Ngày diễn ra: {$day_format} </strong></p>";
							}
							else if ($cat == 4) {
								if ($compare < 0){
									echo "<div class='alert alert-warning' role='alert'><strong>Đã hết hạn</strong></div>";
								} else {
									echo "<p><strong>Hạn nộp hồ sơ: {$day_format} </strong></p>";
								}
							}

							?>
						</p>
					</div>
				</div>
			</div>
		</li>
		<?php endforeach; ?>
	</ul>
</div>
<script type="text/javascript">
	$('body').on('click', '.btn-like', function() {
	console.log("aaaaa")
	var id = $(this).attr('data-id');
	var love = $(this).children('.like-count').text();
	$('button[data-id= '+ id + ' ]').each(function() {
		if(!$(this).hasClass('active')) {
			$(this).addClass('active')
			$(this).children('.like-count').text(parseInt(love) + 1)
		} else {
			$(this).removeClass('active')
			$(this).children('.like-count').text(parseInt(love) - 1)
		}
	});

	$.ajax({
	    url     : "<?php echo get_template_directory_uri(); ?>/ajax-like-post.php",
	    type    : "POST",
	    data    : {'post_id' : $(this).attr('data-id')}
	  })
	  .done(function(result){
	    if(result == 'success'){
	    	console.log("aaaa")
	    }
	  })
	  .fail(function(err){
	    alert('An error has occured while processing the request: ' + err);
	  });
	})

	console.log(used_post)
	var allowScroll = true;
	$(window).scroll(function(){
		if(!allowScroll) return ;
		if ($(document).height() - $(window).height() - 200 <= $(window).scrollTop()){
			allowScroll = false;
			$.ajax({
				url     : "<?php echo get_template_directory_uri(); ?>/ajax-get-posts.php",
				type    : "POST",
				data    : {"exclude" : used_post.join(",")}

			}).done(function (res){
				$items = $(res)
				$('#timeline').append($items);				
			}).fail(function(err){
				console.log(err)
				$('#timeline').append("<div class='alert alert-danger' role='alert'>" + err +"</div>");
			}).always(function(){
				allowScroll = true;
			})
		}
	})

	
</script>

<?php get_footer(); ?>