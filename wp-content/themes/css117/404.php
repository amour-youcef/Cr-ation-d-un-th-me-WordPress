<?php get_header(); ?>

	<section>
		<div class="container">
			<div class="jumbotron">
				<h1>La page que vous avez demandée n'existe pas sur le site</h1>
				<img src="<?php echo get_template_directory_uri(); ?>/assets/404-logo.jpg" alt="">
			</div>

			<div class="row">


				<?php $args_blog = array(
					'post_type' => 'post',
					'posts_per_page' => 6
					);
				$req_blog = new WP_Query($args_blog); ?>

				<?php if ($req_blog->have_posts()): ?>
					<section id="blog-front">

						<div class="container">
							<div class="row">
								<?php while($req_blog->have_posts() ): $req_blog->the_post(); ?>
									<div class="col-12 col-sm-6">
										<div class="card mb-4">
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

									<?php if ($req_blog->current_post%2 == 1): ?>
										<div class="clearfix"></div>
									<?php endif; ?>
								<?php endwhile; wp_reset_postdata(); ?>

							</div><!-- /row -->
						</div>

					</section>
				<?php endif; ?>
			
			</div><!-- /row -->


		</div><!-- /container -->
	</section>

<?php get_footer(); ?>





























