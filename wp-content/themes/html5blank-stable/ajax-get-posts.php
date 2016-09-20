<?php
	require_once('../../../wp-load.php');
	$current_user = wp_get_current_user();

	$args = array(
		'posts_per_page'   => 5,
		'category'         => '3,4',
		'orderby'          => 'date',
		'order'            => 'DESC',
		'exclude'          => explode(",", $_POST['exclude']),
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

<?php
	endforeach;
?>