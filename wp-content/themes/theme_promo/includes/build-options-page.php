<?php

function lgmac_build_options_page() {  

	$theme_opts  = get_option('lgmac_opts');   ?>	


	<div class="wrap">
		<div class="container">

			<?php if(isset($_GET['status']) && $_GET['status'] == 1)  {
				echo '<div class="alert alert-success">Mise à jour effectuée avec succès</div>';
			} ?>

			<div class="jumbotron">
			  <h1 class="h2">Paramètres du site</h1>
			</div>

			<form id="form-lgmac-options" class="form-horizontal" method="post" action="admin-post.php">
				<input type="hidden" name="action" value="lgmac_save_options">
				<?php // attribut value = "fonction utilisée pour sauvegarder les options" 
					  // add_action('admin_post_lgmac_save_options', 'my-function');  

				wp_nonce_field('lgmac_options_verify');  ?>

				<div class="col-xs-12">
					<h1 class="h2">Image du logo en page d'accueil (haut de page)</h1>
					<div class="row">
						<div class="col-lg-5">
							<img style="margin-bottom:20px;" id="img_preview_01" 
							src="<?php echo $theme_opts['image_01_url']; ?>" 
							class="img-responsive img-thumbnail" alt="">
						</div>
						<div class="col-lg-6 col-lg-offset-1">
							<button class="btn btn-primary btn-lg btn-select-img" type="button" 
							id="btn_img_01">Choisir une image pour le logo</button>
						</div>
					</div><!-- /row -->
					<div class="form-group">
						<label for="lgmac_image_01" class="col-sm-2 control-label">image sauvegardée</label>
						<div class="col-sm-10">
							<input type="text" width="300px" id="lgmac_image_01" name="lgmac_image_01"  disabled
							value="<?php echo $theme_opts['image_01_url']; ?>"  style="width:100%;" />
							<input type="hidden" width="300px" id="lgmac_image_url_01" name="lgmac_image_url_01" 
							value="<?php echo $theme_opts['image_01_url']; ?>"  style="width:100%;" />
						</div>
					</div>
				</div>


				<div class="col-xs-12">
					<div class="form-group">
						<label for="lgmac_legend_01" class="col-sm-2 control-label">Légende</label>
						<div class="col-sm-10">
							<input type="text"  id="lgmac_legend_01" name="lgmac_legend_01"
							value="<?php echo stripslashes($theme_opts['legend_01']); ?>"  style="width:100%;" >
						</div>
					</div>
				</div><!-- /col-xs-12 -->
				

				<div>
					<button id="validator" type="submit" class="btn btn-success btn-lg">Mettre à jour les options</button>
				</div>

			</form>
			
		</div><!-- /container -->
	</div><!-- /wrap -->

	<?php

	}  // fin fn lgmac_build_options_page