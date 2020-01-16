<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">	


	<?php if(is_home()): ?>
		<meta name="description" content="Le site présente la page des articles du blog 
		Lorem ipsum dolor sit amet, consectetur adipisicing elit. At, aspernatur." />
	<?php endif; ?>

	<?php if(is_front_page()): ?>
		<meta name="description" content="Le site présente la page d'accueil statique
		Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit, impedit." />
	<?php endif; ?>

	<?php if(is_page()  && !is_front_page()): ?>
		<meta name="description" content="Le site présente une contenu de type page    
		Loorem ipsuum dolor sit amet, consectetur adipisicing elit. At, aspernatur." />
	<?php endif; ?>

	<?php if ( is_category()): ?>
	  <meta name="description" content="Liste des articles pour 
	  la catégorie <?php echo single_cat_title('',false); ?>, Lorem ipsum dolor sit amet, consectetur." /> 
	<?php endif; ?>

	<?php if ( is_tag()): ?>
	  <meta name="description" content="Liste des articles reliés 
	  avec l'étiquette [<?php echo single_tag_title('',false); ?>], Lorem ipsum dolor sit amet, consectetur." > 
	<?php endif; ?>


	<?php wp_head();  ?>  

</head>


<body>

	<header>
		<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
			<div class="container">
			  <a class="navbar-brand" href="<?php echo bloginfo('url'); ?>">Home</a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>

				<?php
        wp_nav_menu( array(
	        	'menu'              => 'top-menu',
            'theme_location'    => 'primary',
            'depth'             => 2,
            'container'         => 'div',
            'container_class'   => 'collapse navbar-collapse',
            'container_id'      => 'navbar',
            'menu_class'        => 'nav navbar-nav ml-auto',
            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
            'walker'            => new WP_Bootstrap_Navwalker())
        );  ?>

			</div><!-- /container -->
		</nav>
	</header>

	<section>
		<div class="container">
			<div class="jumbotron">

				<?php 	$theme_opts  = get_option('lgmac_opts');   ?>	
				<div class="row">
					<div class="col-md-4">
						
						<img class="img-fluid" src="http://localhost/git/wp/wp-content/uploads/2020/01/screenshot-150x150.png" alt="">
						<p class="text-center"><?php echo stripslashes($theme_opts['legend_01']); ?></p>
					</div>
					<div class="col-md-8">
						<h1 class="m-up-reset">Blog ccs117</h1>
						<p>et n’arrêtez jamais d’apprendre car la Vie, elle, ne cesse jamais d’enseigner..</p>		
					</div>
				</div>


			</div>
		</div><!-- /container -->
	</section>


