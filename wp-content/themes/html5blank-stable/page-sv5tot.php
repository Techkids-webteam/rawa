<?php get_header(); ?>

<script>
	used_user = [];
</script>
<!--MODAL -->
<div class="modal fade bs-example-modal-lg" id="modal-student" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content modal-student">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<div class="row">
				<div class="col-sm-6 modal-student-img">
					<img src="<?php echo get_template_directory_uri(); ?>/img/sample_student_2.jpg">
				</div>
				<div class="col-sm-6 modal-student-description">
					<div class="student-info clearfix">
						<div class="col-xs-8">
							<a href="#"><h4><?php echo $username; ?></h4></a>
						</div>
						<div class="col-xs-4">
							<button class="btn btn-default btn-rated"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> <span class="like-count"></span></button>
						</div>
						<div class="col-xs-12">
							<p></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container top-list-container">
	<div class="page-heading">
		<h2>TOP RATED</h2>
	</div>
	<ul class="row student-list" id="top-list">
<?php
$args = array(
	'role__not_in' => array('Pending'),
	'meta_key' => 'like_num',
	'orderby' => 'meta_value',
	'order' => 'DESC',
	'number' => 3
);
$top_user_query = new WP_User_Query( $args );

// User Loop
if ( ! empty( $top_user_query->results ) ) {
	foreach ( $top_user_query->results as $top_user ) :

?>

<li class="col-md-4 col-sm-4 student-item">
	<div class="student-item-content clearfix">
		<div class="img-container">
			<a href="#" class="user-detail-link" data-id="<?php echo $top_user->ID;?>">
				<?php echo get_avatar( $top_user->ID, 650);?>
			</a>
		</div>
		<div class="col-xs-12 student-info-container">
			<div class="student-info clearfix">
				<div class="col-xs-8">
					<a href="#" class="user-detail-link" data-id="<?php echo $top_user->ID;?>"><h4><?php echo $top_user->nickname ?></h4></a>
				</div>
				<div class="col-xs-4">
					<button class="btn btn-default btn-rated
					<?php
						if(in_array($current_user->ID, $top_user->like)) {
							echo " active";
						};
					?>
					" data-id="<?php echo $top_user->ID;?>" ><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> <span class="like-count"><?php echo count($top_user->like); ?></span></button>
				</div>
				<div class="col-xs-12">
					<p></p>
				</div>
			</div>
		</div>
	</div>
</li>

<?php
	endforeach;
	}

	else {
		echo'no user';
	}
?>
	</ul>
	<div class="student-list-dots"></div>
</div>

<div class="container random-list-container">
	<div class="page-heading">
		<h2>RANDOM LIST</h2>
	</div>
	<ul class="row student-list" id="random-list">

	<?php

		$user_array = array(
			'role__not_in' => array('Pending'),
			'orderby' => 'rand',
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
							<p><?php echo $user->description ?> </p>
						</div>
					</div>
				</div>
			</div>
		</li>
		<?php
			endforeach;
		?>
	</ul>
</div>

<script type="text/javascript">
	console.log(used_user)
	//Love Button
	$('body').on('click', '.btn-rated', function() {
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
	    url     : "<?php echo get_template_directory_uri(); ?>/ajax-upvote-user.php",
	    type    : "POST",
	    data    : {'user_id' : $(this).attr('data-id')}
	  })
	  .done(function(result){
	    if(result == 'success'){

	    }
	  })
	  .fail(function(err){
	    alert('An error has occured while processing the request: ' + err);
	  });

	})

	//Modal
	$('body').on('click', '.user-detail-link' ,function(e){
		e.preventDefault();

		$.ajax({
			url     : "<?php echo get_template_directory_uri(); ?>/ajax-get-user-modal.php",
			type	: "POST",
			data    : {'user_id' : $(this).attr('data-id')}
		})
		.done(function (res) {
			$('.modal-student-description .col-xs-8 a h4').html(res.nickname);
			$('.modal-student-description .col-xs-12 p').html(res.description);
			$('.modal-student-description .like-count').html(res.like);
			$('.modal-student-img').html(res.img);
			$('.modal-student-description button').removeClass("active");
			$('.modal-student-description button').addClass(res.status);
			$('.modal-student-description button').attr("data-id", res.id);
			$('#modal-student').modal('show')
			console.log(res);
		})
	})
	var allowScroll = true;
	$(window).scroll(function(){
		if(!allowScroll) return ;
		console.log(allowScroll);
		if ($(document).height() - $(window).height() - 200 <= $(window).scrollTop()){
			allowScroll = false;
			$.ajax({
				url     : "<?php echo get_template_directory_uri(); ?>/ajax-get-users.php",
				type    : "POST",
				data    : {"exclude" : used_user.join(",")}

			}).done(function (res){

				$items = $(res)
				$('#random-list').append($items).masonry('appended', $items);
			}).fail(function(err){
				console.log(err)
				$('.random-list-container').append("<div class='alert alert-danger' role='alert'>" + err +"</div>");
			}).always(function(){
				allowScroll = true;
			})
		}
	})

</script>

<?php get_footer(); ?>
