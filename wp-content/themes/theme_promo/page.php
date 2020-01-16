<?php get_header(); ?>

	<section>
		<div class="container">
			<?php  if (have_posts()):  ?>
					<?php while( have_posts()): the_post(); ?>				
						<div class="row m-dw-30">
							<div class="col-12">
								<h1><a href="<?php the_permalink(); ?>"><?php  the_title(); ?></a></h1>
								<?php the_content();   ?>
							</div>
						</div><!-- /row -->
					<?php endwhile;  ?>

			<?php else:  ?>
					<div class="row">
						<div class="col-12">
							<p>y a pas de résultats</p>
						</div>
					</div>
			<?php endif;	?>
		</div><!-- /container -->
	</section>

<?php get_footer(); ?>
