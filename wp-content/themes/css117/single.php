<?php get_header(); ?>

	<section>
		<div class="container">
			<?php  if (have_posts()):  ?>
					<?php while( have_posts()): the_post();	 ?>

						<div class="row m-dw-30"> 
							<div class="col-12" id="can-have-caption">
								<h1><?php  the_title(); ?></h1>
								<p>
								<?php	echo lgmac_give_me_meta_01(
										esc_attr( get_the_date( 'c' ) ), 
										esc_html( get_the_date()),
								    get_the_category_list( ', '),
								    get_the_tag_list('', ', ')
								    ); ?>
								</p>

								<?php the_content(); ?>
							</div>
						</div><!-- /row -->

					<?php endwhile;  ?>

					<div class="row">
						<div class="col-12">
							<nav>
								<ul class="machin-pager">
									<li class='float-left'><?php previous_post_link(); ?></li>
									<li class='float-right'><?php next_post_link(); ?></li>
								</ul>
							</nav>
						</div><!-- col-xs-12 -->
					</div><!-- /row -->

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





























