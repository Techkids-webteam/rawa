<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
    <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
    <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<link href="<?php echo get_template_directory_uri(); ?>/normalize.css" rel="stylesheet" type="text/css">
		<link href="<?php echo get_template_directory_uri(); ?>/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<link href="<?php echo get_template_directory_uri(); ?>/libs/slick/slick/slick.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
		<link href="<?php echo get_template_directory_uri(); ?>/fonts/fonts.css" rel="stylesheet" type="text/css">
		<link href="<?php echo get_template_directory_uri(); ?>/style.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/libs/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/libs/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/libs/masonry.pkgd.min.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/libs/imagesloaded.pkgd.min.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/libs/slick/slick/slick.min.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>

		<?php wp_head(); ?>

		<script>
	    // conditionizr.com
	    // configure environment tests
	    conditionizr.config({
	        assets: '<?php echo get_template_directory_uri(); ?>',
	        tests: {}
	    });
    </script>

	</head>
	<body <?php body_class(); if(!is_page('home')) echo 'style="padding-top: 50px;"';?>>
		<div class="wrapper">
			<?php if(is_page('home')) : ?>
				<header class="home_header">
					<button class="home_menu_button" id="home_menu_button">
				        <span class="home_bar"></span>
				        <span class="home_bar"></span>
				        <span class="home_bar"></span>
					</button>
					<nav id="home_menu_list" class="home_menu_list text-center">
						<ul>
							<?php
								$current_user = wp_get_current_user();
								if(in_array( 'manager', (array)$current_user->roles)){
									wp_list_pages( array( 'title_li' => '') );
								}
								else{
									$page_to_exclude = get_page_by_path('approve');
									wp_list_pages( array( 'title_li' => '', 'exclude' => $page_to_exclude->ID ) );
								}
								if(is_user_logged_in()) :
							?>
								<li><a href="<?php echo get_site_url(); ?>/your-profile/"><?php echo get_user_meta( get_current_user_id(), 'nickname', true); ?></a></li>
							<?php else : ?>
								<li><a href="<?php echo get_site_url(); ?>/login">Đăng Nhập</a></li>
							<?php endif; ?>
						</ul>
						<div class="mobile_header_foot visible-xs">
							<img src="<?php echo get_template_directory_uri(); ?>/img/logo.png">
							<h3>RAWA.VN</h3>
							<p>Trang thông tin dành cho sinh viên Học viện tài chính</p>
						</div>
					</nav>
				</header>
			<?php else : ?>
				<header class="header clear" role="banner">
					<nav class="navbar navbar-default navbar-fixed-top <?php if(is_page('home')) echo 'home-page' ?>" role="navigation">
					  <div class="container">
					    <div class="navbar-header">
					      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					        <span class="sr-only">Toggle navigation</span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					      </button>
					      <a class="navbar-brand" href="<?php echo get_site_url(); ?>">
									<img src="<?php echo get_template_directory_uri(); ?>/img/logo.png">
								</a>
					    </div>

					    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					      <ul class="nav navbar-nav navbar-right">
									<?php
										$current_user = wp_get_current_user();
										if(in_array( 'manager', (array)$current_user->roles)){
											wp_list_pages( array( 'title_li' => '') );
										}
										else{
											$page_to_exclude = get_page_by_path('approve');
											wp_list_pages( array( 'title_li' => '', 'exclude' => $page_to_exclude->ID ) );
										}

										if(is_user_logged_in()) :
									?>
										<li class="dropdown">
						          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo get_user_meta( get_current_user_id(), 'nickname', true); ?> <span class="caret"></span></a>
						          <ul class="dropdown-menu">
						            <li><a href="<?php echo get_site_url(); ?>/your-profile/">Hồ sơ</a></li>
						            <li><a href="<?php echo wp_logout_url(); ?> ">Đăng xuất</a></li>
						          </ul>
						        </li>
								<?php else : ?>
									<li><a href="<?php echo get_site_url(); ?>/login">Đăng Nhập</a></li>
								<?php endif; ?>
					      </ul>
						  </div>
						</div>
					</nav>
				</header>
			<?php endif; ?>
