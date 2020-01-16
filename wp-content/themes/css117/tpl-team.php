<?php
/*
Template Name: Page équipe
*/

get_header();

function give_me_the_parent() {
	global $post;

	if ($post->post_parent) {
		return $post->post_parent;
		}	
		return $post->ID;
	}

function page_has_child()  {
	global $post;
	$pages_child = get_pages('child_of=' .$post->ID);
	return count($pages_child);
}
 ?>

	<section>
		<div class="container">
			<?php  if (have_posts()):  ?>
					<?php while( have_posts()): the_post(); ?>				
						<div class="row m-dw-30">

							<?php if(page_has_child() || $post->post_parent > 0): ?>
								<div class="col-12">
									<div class="menu-with-child">
										<a href="<?php echo get_the_permalink(give_me_the_parent()); ?>">
											<?php echo get_the_title(give_me_the_parent()); ?>
										</a>

										<ul>
											<?php 	$args = array(
												'child_of' => give_me_the_parent(),
												'title_li' => ''
											); 
											wp_list_pages($args); ?>
										</ul>
									</div><!-- /menu-with-child -->
								</div><!-- /col-12 -->
							<?php endif; ?>


							<div class="col-8">
								<h1><a href="<?php the_permalink(); ?>"><?php  the_title(); ?></a></h1>
								<?php the_content();   ?>
							</div>
							<div class="col-4">
								<?php if ($thumbnail_html = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium-large' )) :
					        $thumbnail_src = $thumbnail_html['0']; ?>
								<a href="<?php the_permalink(); ?>">
									<img class="img-fluid img-thumbnail" src="<?php echo $thumbnail_src; ?>" alt="***ne pas oublier cet attribut !!**">
								</a>
					        <?php 
						    endif; ?>

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

