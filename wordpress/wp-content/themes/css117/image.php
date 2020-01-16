<?php get_header(); ?>

<section>
	<div class="container">
		<?php  if (have_posts()):  ?>
				<?php while( have_posts()): the_post();
					$alt_text = get_post_meta($post->ID, '_wp_attachment_image_alt',  true);
					$big_metadata = wp_get_attachment_metadata($post->ID);  
					$month_upload = substr($big_metadata['file'],0,7);  
					$base_path = wp_upload_dir($month_upload)['url'].'/';
					$full_file = $base_path . substr($big_metadata['file'], 8);		?>				

					<div class="row m-dw-30">
						<!-- ***********************************************
						*********  caractéristiques principales de l'image *
						**************************************************** -->
						<div class="col-12">
							<h1>Image principale</h1>

						</div>
						<div class="col-sm-2 col-md-4"><!-- la vignette -->
							<img class="img-fluid img-thumbnail" src="<?php echo $full_file; ?>" alt="">
						</div>
						<div class="col-sm-10 col-md-8">
							<h2 class="m-up-reset"><?php  the_title(); ?></h2>
							<p><b>width:</b> <?php echo $big_metadata['width']; ?> <b>heigth:</b> <?php echo $big_metadata['height']; ?></p>
							<p>Image principale (id:<?php echo $post->ID; ?>)<br> <?php echo $full_file; ?></p>
							<div>
								<b>Description:</b> <?php the_content();   ?>
							</div>
							<div>
								<b>Légende:</b> <?php the_excerpt();   ?>
							</div>
							<div>
								<p>téléversée le <?php	echo	esc_html( get_the_date()); ?>	</p>
								<b>texte alternatif:</b> <?php echo $alt_text;   ?>
							</div>
						</div>
					</div><!-- /row -->

					<?php if (current_user_can('edit_posts')):  ?>

						<div class="row">
							<!-- ***********************************************
							*********  autres tailles de l'image    *
							**************************************************** -->
							<div class="col-12">
								<h1>Autres tailles</h1>
							</div>

							<?php foreach ($big_metadata['sizes'] as $key=>$value) : ?>
								<div class="col-12">
									<h2><?php	echo $key; ?></h2>
									<p><?php echo $base_path.$value['file']; ?></p>
									<p class="lead"><?php echo $value['width']; ?> X <?php echo $value['height']; ?></p>
								</div>
								<div class="col-12 col-lg-8">
									<img class="img-fluid img-thumbnail" src="<?php echo $base_path.$value['file']; ?>" alt="<?php echo $alt_text;   ?>">
								</div>
							<?php endforeach; ?>

						</div><!-- /row -->

						<?php
						$tab_temp = array();
						$tab_test = get_post_meta($post->ID);
						foreach ($tab_test as $key => $value) {
						 	$tab_temp[] = $key;
						 } 

					 	if (in_array("_wp_attachment_backup_sizes", $tab_temp)): ?>
							<!-- ***********************************************
							*********  images backup    *
							**************************************************** -->
							<div class="row">
								<div class="col-12">
									<h1>Fichiers de Backup</h1>
								</div>

								<?php 
								$tab_origine = array();
								$tab_others  = array();


								foreach (get_post_meta($post->ID, '_wp_attachment_backup_sizes', true) as $key => $value):
									if (substr($key, -5) == '-orig'):
										$tab_origine[] = array($key, $value['file']);
									else:
										$tab_others[]  = array($key, $value['file']);
									endif;
								endforeach; 

								if (count($tab_origine) > 0): ?>
									<div class="col-12">
										<h2>Fichiers originaux</h2>
										<table class="table">
											<?php foreach ($tab_origine as $origine): ?>
												<tr>
													<td><?php echo $origine[0]; ?></td>
													<td><?php echo $origine[1]; ?></td>
												</tr>	
											<?php endforeach; ?>
										</table>
									</div><!-- /col-xs-12 -->
								<?php endif;  ?>

								<?php if (count($tab_others) > 0): ?>
									<div class="col-12">
										<table class="table">
											<h2>Anciens fichiers modifiés</h2>
											<?php foreach ($tab_others as $others): ?>
												<tr>
													<td><?php echo $others[0]; ?></td>
													<td><?php echo $others[1]; ?></td>
												</tr>	
											<?php endforeach; ?>
										</table>
									</div><!-- /col-xs-12 -->
								<?php endif;  ?>
							</div><!-- /row -->
						<?php endif;  // existence backup_sizes ?>
					<?php endif; // can edit_posts ?>

				<?php endwhile; //boucle principale ?>

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





























