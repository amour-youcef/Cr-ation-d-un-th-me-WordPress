<?php get_header();

?>

<?php  get_template_part('slider','home'); ?>


<?php 

$args_media_front = array(
	'post_type' => 'lgmac_media',
	'posts_per_page' => 4,
	'orderby' => 'rand'
	);
$req_media_front = new WP_Query($args_media_front); 

if ($req_media_front->have_posts()): ?>
	<section class="media-front m-dw-30">
		<div class="container">
			<div class="row">
				<?php while($req_media_front->have_posts() ): $req_media_front->the_post(); ?>
										
				<article class="col-12 col-sm-6 col-lg-3 d-flex mb-3">
					<div class="card panel-default">
						<?php the_post_thumbnail('medium-large', array( 'class' => 'img-fluid card-img-top' )); ?>
						<div class="card-footer h-100">
							<h1 class="h4 text-center"><?php the_title(); ?></h1>
						</div><!-- /panel footer -->
					</div><!-- /panel -->
				</article>

				<?php endwhile; wp_reset_postdata(); ?>
			</div><!-- /row -->
		</div><!-- /container -->

	</section>
<?php endif; // fin $req_media_front ?>



<?php $args_blog = array(
	'post_type' => 'post',
	'posts_per_page' => 2
	);
$req_blog = new WP_Query($args_blog); ?>

<?php if ($req_blog->have_posts()): ?>
	<section id="blog-front">

		<div class="container">
			<div class="row">
				<?php while($req_blog->have_posts() ): $req_blog->the_post(); ?>
					<div class="col-12 col-sm-6">
						<div class="card">
							<div class="card-header">
								<h2 class="text-center"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							</div>
							<div class="card-body">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail( 'medium', 
									array( 'class' => 'img-fluid aligncenter' ) ); ?>
								</a>
								<?php the_excerpt(); ?>
							</div>
							<div class="card-footer">
								<p>
								<?php  
								echo lgmac_give_me_meta_01(
										esc_attr( get_the_date( 'c' ) ), 
										esc_html( get_the_date()),
									    get_the_category_list( ', '),
									    get_the_tag_list('', ', ')
									    ); ?>
								</p>
							</div>
						</div>
					</div>
				<?php endwhile; wp_reset_postdata(); ?>

			</div><!-- /row -->
		</div>

	</section>
<?php endif; ?>

	<section>
		<div class="container">
			<?php  if (have_posts()):  ?>
					<?php while( have_posts()): the_post(); ?>	
						<div class="row">
							<div class="col-12">
								<?php the_title('<h1 class="text-center">','</h1>');  ?>
								<?php the_content();  ?>
							</div>
						</div>			

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




























