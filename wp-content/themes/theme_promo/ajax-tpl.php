<?php 
/*
Template Name:Ajax-Test
*/


get_header(); ?>

	<section>
		<div class="container">

 			<div class="row">
				<div class="col-12 bg-success">
					<form id="form-ajax-test" action="" method="post">
						<p>Saisir une chaine de caractères pour votre recherche.</p>						
						<input type="text" id="send-value" name="send-value" value="">						
						<input type="submit" name="lgmac-ajax-test-submit" value="valider">
					</form>
					<div id="result" class="m-up-20"></div>
				</div>
			</div>

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


 ?>
