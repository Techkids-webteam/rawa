<?php /* Template Name: Login Register Flow */ ?>
<?php get_header(); ?>
	<article class="container" style="margin-top: 20px;">
    <div class="row">
      <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 login_flow_container" style="background: #ffffff;">
        <h1><?php the_title(); ?></h1>

    		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
    		<?php the_content(); ?>
    		<?php endwhile;endif; ?>
      </div>
    </div>
	</article>

<?php get_footer(); ?>
