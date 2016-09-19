<?php get_header(); ?>
<div class="container-fluid banner news-banner">
</div>
	<main role="main">
		<section class= "container">
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2 col-xs-12">
					<div class="post-container">
			<?php if (have_posts()): while (have_posts()) : the_post(); ?>

				<!-- article -->
				<article class="post-content" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
 					<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php the_post_thumbnail(); // Fullsize image for the single post ?>
						</a>
					<?php endif; ?> 
					<h1>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
					</h1>
					<?php echo "<p><strong>";
							the_excerpt();
						echo "</strong></p>"; 
					?>

					<?php the_content(); // Dynamic Content ?>
				</article>
				<!-- /article -->


			<?php endwhile; ?>

			<?php else: ?>

		<!-- article -->
		<article>

			<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

		</article>
		<!-- /article -->

	<?php endif; ?>
					</div>
				</div>
			</div>
		</section>

	</main>

<?php get_footer(); ?>
