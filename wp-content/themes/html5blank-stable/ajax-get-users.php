<?php
	require_once('../../../wp-load.php');
	$current_user = wp_get_current_user();
	$user_array = array(
		'role__not_in' => array('Pending', 'Administrator'),
		'orderby' => 'rand',
		'exclude' => explode(",", $_POST['exclude']),
		'number' => 6
	);	
	$blogusers = new WP_User_Query( $user_array );
	foreach ( $blogusers->results as $user ) : 
?>
	<script>used_user.push(<?php echo $user->ID ?>);</script>
	<li class="col-md-4 col-sm-4 student-item">
		<div class="student-item-content clearfix">
			<div class="img-container">
				<a href="#" data-id = "<?php  echo $user->ID;?>" class="user-detail-link">
					<?php echo get_avatar( $user->ID, 650);?>
				</a>
			</div>
			<div class="col-xs-12 student-info-container">
				<div class="student-info clearfix">
					<div class="col-xs-8">
						<a href="#" class="user-detail-link" data-id = "<?php  echo $user->ID;?>"><h4><?php echo $user->nickname ?></h4></a>
					</div>
					<div class="col-xs-4">
						<button class="btn btn-default btn-rated 
						<?php
							if(in_array($current_user->ID, $user->like)) {
								echo " active";
							};
						?>
						" data-id = "<?php  echo $user->ID;?>"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> <span class="like-count"><?php echo count($user->like); ?></span></button>
					</div>
					<div class="col-xs-12">
						<p><?php echo nl2br(esc_html($user->description)); ?> </p>
					</div>
				</div>
			</div>
		</div>
	</li>
<?php
	endforeach;
?>