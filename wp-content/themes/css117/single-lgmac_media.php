<?php get_header(); ?>

	<section>
		<div class="container">
			<?php  if (have_posts()):  ?>
					<?php while( have_posts()): the_post(); ?>				

						<?php get_template_part('content');  ?>

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




























