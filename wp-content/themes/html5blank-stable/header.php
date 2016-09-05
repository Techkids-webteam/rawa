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

		<?php wp_head(); ?>
		<script>
	    // conditionizr.com
	    // configure environment tests
	    conditionizr.config({
	        assets: '<?php echo get_template_directory_uri(); ?>',
	        tests: {}
	    });
    </script>
		<link href="<?php echo get_template_directory_uri(); ?>/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<link href="<?php echo get_template_directory_uri(); ?>/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/libs/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/libs/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/libs/masonry.pkgd.min.js"></script>
	</head>
	<body <?php body_class(); ?>>

		<!-- wrapper -->
		<div class="wrapper">

			<!-- header -->
			<header class="header clear" role="banner">

					<!-- logo -->
					<div class="logo">
						<a href="<?php echo home_url(); ?>">
							<!-- svg logo - toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script -->
							<img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="Logo" class="logo-img">
						</a>
					</div>
					<!-- /logo -->

					<!-- nav -->
					<nav class="nav" role="navigation">
						<?php html5blank_nav(); ?>
					</nav>
					<!-- /nav -->

			</header>
			<!-- /header -->
