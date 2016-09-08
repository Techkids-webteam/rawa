<?php get_header(); ?>
<?php $blogusers = get_users(); 
?> 
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
					<button class="btn btn-default btn-rated"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> <?php echo $like ?></button>
				</div>
				<div class="col-xs-12">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor </p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor </p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor </p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor </p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor </p>
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
		<li class="col-md-4 col-sm-4 student-item">
			<div class="student-item-content clearfix">
				<div class="img-container">
					<a href="#">
						<img src="<?php echo get_template_directory_uri(); ?>/img/sample_student.jpg">
					</a>
				</div>
				<div class="col-xs-12 student-info-container">
					<div class="student-info clearfix">
						<div class="col-xs-8">
							<a href="#"><h4>Lorem opsum</h4></a>
						</div>
						<div class="col-xs-4">
							<button class="btn btn-default btn-rated"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> 1000</button>
						</div>
						<div class="col-xs-12">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor </p>
						</div>
					</div>
				</div>
			</div>
		</li>
		<li class="col-md-4 col-sm-4 student-item">
			<div class="student-item-content clearfix">
				<div class="img-container">
					<a href="#">
						<img src="<?php echo get_template_directory_uri(); ?>/img/sample_student.jpg">
					</a>
				</div>
				<div class="col-xs-12 student-info-container">
					<div class="student-info clearfix">
						<div class="col-xs-8">
							<a href="#"><h4>Lorem opsum</h4></a>
						</div>
						<div class="col-xs-4">
							<button class="btn btn-default btn-rated"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> 1000</button>
						</div>
						<div class="col-xs-12">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor </p>
						</div>
					</div>
				</div>
			</div>
		</li>
		<li class="col-md-4 col-sm-4 student-item">
			<div class="student-item-content clearfix">
				<div class="img-container">
					<a href="#">
						<img src="<?php echo get_template_directory_uri(); ?>/img/sample_student.jpg">
					</a>
				</div>
				<div class="col-xs-12 student-info-container">
					<div class="student-info clearfix">
						<div class="col-xs-8">
							<a href="#"><h4>Lorem opsum</h4></a>
						</div>
						<div class="col-xs-4">
							<button class="btn btn-default btn-rated"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> 1000</button>
						</div>
						<div class="col-xs-12">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor </p>
						</div>
					</div>
				</div>
			</div>
		</li>
	</ul>
	<div class="student-list-dots"></div>
</div>

<div class="container random-list-container">
	<div class="page-heading">
		<h2>RANDOM LIST</h2>
	</div>
	<ul class="row student-list" id="random-list">

	<?php
		foreach ($blogusers as $user):
	?>
		<li class="col-md-4 col-sm-4 student-item">
			<div class="student-item-content clearfix">
				<div class="img-container">
					<a href="#" data-id = "<?php  echo $user->ID;?>"	>
						<?php echo get_avatar( $user->ID, 650);?>
					</a>
				</div>
				<div class="col-xs-12 student-info-container">
					<div class="student-info clearfix">
						<div class="col-xs-8">
							<a href="#"><h4><?php echo $user->nickname ?></h4></a>
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
<!-- 		<li class="col-md-4 col-sm-4 student-item">
			<div class="student-item-content clearfix">
				<div class="img-container">
					<a href="#">
						<img src="<?php echo get_template_directory_uri(); ?>/img/sample_student_2.jpg">
					</a>
				</div>
				<div class="col-xs-12 student-info-container">
					<div class="student-info clearfix">
						<div class="col-xs-8">
							<a href="#"><h4>Lorem opsum</h4></a>
						</div>
						<div class="col-xs-4">
							<button class="btn btn-default btn-rated"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> 1000</button>
						</div>
						<div class="col-xs-12">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor </p>
						</div>
					</div>
				</div>
			</div>
		</li>
		<li class="col-md-4 col-sm-4 student-item">
			<div class="student-item-content clearfix">
				<div class="img-container">
					<a href="#">
						<img src="http://2.gravatar.com/avatar/26ac1b5d2622fdcb33dc3f84bfeeb36a?s=300&d=mm&r=g">
					</a>
				</div>
				<div class="col-xs-12 student-info-container">
					<div class="student-info clearfix">
						<div class="col-xs-8">
							<a href="#"><h4>Lorem opsum</h4></a>
						</div>
						<div class="col-xs-4">
							<button class="btn btn-default btn-rated"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> 1000</button>
						</div>
						<div class="col-xs-12">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor </p>
						</div>
					</div>
				</div>
			</div>
		</li>
		<li class="col-md-4 col-sm-4 student-item">
			<div class="student-item-content clearfix">
				<div class="img-container">
					<a href="#">
						<img src="<?php echo get_template_directory_uri(); ?>/img/sample_student_4.jpg">
					</a>
				</div>
				<div class="col-xs-12 student-info-container">
					<div class="student-info clearfix">
						<div class="col-xs-8">
							<a href="#"><h4>Lorem opsum</h4></a>
						</div>
						<div class="col-xs-4">
							<button class="btn btn-default btn-rated"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> 1000</button>
						</div>
						<div class="col-xs-12">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor </p>
						</div>
					</div>
				</div>
			</div>
		</li>
		<li class="col-md-4 col-sm-4 student-item">
			<div class="student-item-content clearfix">
				<div class="img-container">
					<a href="#">
						<img src="<?php echo get_template_directory_uri(); ?>/img/sample_student_5.jpg">
					</a>
				</div>
				<div class="col-xs-12 student-info-container">
					<div class="student-info clearfix">
						<div class="col-xs-8">
							<a href="#"><h4>Lorem opsum</h4></a>
						</div>
						<div class="col-xs-4">
							<button class="btn btn-default btn-rated"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> 1000</button>
						</div>
						<div class="col-xs-12">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor </p>
						</div>
					</div>
				</div>
			</div>
		</li>
		<li class="col-md-4 col-sm-4 student-item">
			<div class="student-item-content clearfix">
				<div class="img-container">
					<a href="#">
						<img src="<?php echo get_template_directory_uri(); ?>/img/sample_student_6.jpg">
					</a>
				</div>
				<div class="col-xs-12 student-info-container">
					<div class="student-info clearfix">
						<div class="col-xs-8">
							<a href="#"><h4>Lorem opsum</h4></a>
						</div>
						<div class="col-xs-4">
							<button class="btn btn-default btn-rated"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> 1000</button>
						</div>
						<div class="col-xs-12">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor </p>
						</div>
					</div>
				</div>
			</div>
		</li>
		<li class="col-md-4 col-sm-4 student-item">
			<div class="student-item-content clearfix">
				<div class="img-container">
					<a href="#">
						<img src="<?php echo get_template_directory_uri(); ?>/img/sample_student.jpg">
					</a>
				</div>
				<div class="col-xs-12 student-info-container">
					<div class="student-info clearfix">
						<div class="col-xs-8">
							<a href="#"><h4>Lorem opsum</h4></a>
						</div>
						<div class="col-xs-4">
							<button class="btn btn-default btn-rated"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> 1000</button>
						</div>
						<div class="col-xs-12">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor </p>
						</div>
					</div>
				</div>
			</div>
		</li>
		<li class="col-md-4 col-sm-4 student-item">
			<div class="student-item-content clearfix">
				<div class="img-container">
					<a href="#">
						<img src="<?php echo get_template_directory_uri(); ?>/img/sample_student_2.jpg">
					</a>
				</div>
				<div class="col-xs-12 student-info-container">
					<div class="student-info clearfix">
						<div class="col-xs-8">
							<a href="#"><h4>Lorem opsum</h4></a>
						</div>
						<div class="col-xs-4">
							<button class="btn btn-default btn-rated"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> 1000</button>
						</div>
						<div class="col-xs-12">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor </p>
						</div>
					</div>
				</div>
			</div>
		</li> -->
	</ul>	
</div>

<script type="text/javascript">
	//Love Button
	$('body').on('click', '.btn-rated', function() {
		var id = $(this).attr('data-id');
		var love = $(this).children('.like-count').text();
		if(!$(this).hasClass('active')) {
			$(this).children('.like-count').text(parseInt(love) + 1)
		} else {
			$(this).children('.like-count').text(parseInt(love) - 1)
		}

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
	$('body').on('click', '.img-container a' ,function(e){
		e.preventDefault();
		$('#modal-student').modal('show')
		$.ajax({
			url     : "<?php echo get_template_directory_uri(); ?>/ajax-get-user-modal.php",
			type	: "POST",
			data    : {'user_id' : $(this).attr('data-id')}
		})
		.done(function (res) {
			console.log(res);
		})
	})

</script>

<?php get_footer(); ?>