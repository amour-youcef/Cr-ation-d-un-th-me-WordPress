<?php

define('LGMAC_VERSION', '1.0.3');  

//=========================================================================
//==============              chargement des styles/scripts Front End
//=========================================================================

function lgmac_scripts() {

	// chargement des styles
	wp_enqueue_style( 'lgmac_bootstrap-core', get_template_directory_uri() . '/css/bootstrap.min.css', array(), 
		LGMAC_VERSION , 'all' );

	if (is_front_page()) :
		wp_enqueue_style( 'lgmac_animate', get_template_directory_uri() . '/css/animate.css', array(), 
			LGMAC_VERSION , 'all' );
		wp_enqueue_style( 'lgmac_custom', get_template_directory_uri() . '/style.css', 
			array('lgmac_bootstrap-core', 'lgmac_animate'), 	LGMAC_VERSION , 'all' );

	else:
		wp_enqueue_style( 'lgmac_custom', get_template_directory_uri() . '/style.css', 
			array('lgmac_bootstrap-core'), 	LGMAC_VERSION , 'all' );

	endif;


	// chargement des scripts
	if( !is_admin() ){
		wp_deregister_script('jquery');
		wp_register_script('jquery', get_template_directory_uri() . '/js/jquery-3.2.1.min.js',
			array(), LGMAC_VERSION, true);
		//wp_enqueue_script('jquery');
	}


	wp_enqueue_script('popper-js', get_template_directory_uri() . '/js/popper.min.js', 
		array('jquery'), LGMAC_VERSION, true ); 

	wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', 
		array('jquery', 'popper-js'), LGMAC_VERSION, true ); 


	wp_enqueue_script( 'lgmac_admin_script', get_template_directory_uri() . '/js/machin.js', 
		array('jquery', 'bootstrap-js'), LGMAC_VERSION , true );

	if (is_page()):
		wp_enqueue_script( 'lgmac_ajax_test_script', get_template_directory_uri() . '/js/ajax-test.js', 
		array('jquery'), 	LGMAC_VERSION , true );

		wp_localize_script('lgmac_ajax_test_script', 'ajaxVars', array( 'url' => admin_url( 'admin-ajax.php' )) );
	endif;

}  // fin function lgmac_scripts

add_action('wp_enqueue_scripts', 'lgmac_scripts');




//=========================================================================
//==============              chargement des styles/scripts dashboard
//=========================================================================

function lgmac_admin_init()  {

	// *****************  action 1
	function lgmac_admin_scripts() {
		if(!isset($_GET['page']) || $_GET['page'] != "lgmac_theme_opts")  {
			return;
			}
		// chargement des styles admin
		wp_enqueue_style('bootstrap-adm-core', get_template_directory_uri() . '/css/bootstrap.min-3-3.css', array(), 
			LGMAC_VERSION );

		// chargement des scripts admin
		wp_enqueue_media();
		wp_enqueue_script( 'lgmac-admin-init', get_template_directory_uri() . '/js/admin-options.js', 
			array(), LGMAC_VERSION, true );	

		}  // fin function lgmac_admin_scripts

	add_action('admin_enqueue_scripts', 'lgmac_admin_scripts' );


	// *****************  action 2
	include('includes/save-options-page.php');  // contient la fonction lgmac_save_options
	add_action('admin_post_lgmac_save_options', 'lgmac_save_options');


	}  // fin lgmac_admin_init

add_action('admin_init', 'lgmac_admin_init');



//=========================================================================
//==============   associer les fonctions à exécuter suite aux actions ajax
//=========================================================================
add_action( 'wp_ajax_mon_test_ajax',        'fn_mon_test_ajax' );
add_action( 'wp_ajax_nopriv_mon_test_ajax', 'fn_mon_test_ajax' );

function fn_mon_test_ajax() { 


	global $wpdb;
	$mot_recup = $_POST['data1'];  
	$mot_test = "%$mot_recup%";
	$table_name = $wpdb->prefix . "posts";

	$data_fetch = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $table_name
			WHERE post_content LIKE %s AND post_status='publish'",
			$mot_test
			)
		);


	$results_query = array();
	$final_array =  array();

		if ($data_fetch):
			$final_array["success"] = "true";
			foreach ($data_fetch as $data_line) {
				$results_query[]= array($data_line->post_title, $data_line->post_name, $data_line->guid);
			}
		else:
			$final_array["success"] = "false";
			$results_query[]  = "pas de résultats";	
		endif;



	$final_array["mot"] =  $mot_recup;
	$final_array["results"] = $results_query;


	echo stripslashes(json_encode($final_array));


	die();

}  // fn_mon_test_ajax



//=========================================================================
//==============                 activation des options
//=========================================================================
function lgmac_activ_options() {

	$theme_opts  = get_option('lgmac_opts');
	if(!$theme_opts)  {
		$opts  = array(
			'image_01_url'		  => '',
			'legend_01'			  => ''
			);

		add_option('lgmac_opts', $opts);
	}
}

add_action('after_switch_theme', 'lgmac_activ_options');


//=========================================================================
//==============                  menu options du thème
//=========================================================================
function lgmac_admin_menus()  {
	add_menu_page(
		'Machin Options', 
		'Options du thème', 
		'publish_pages', 
		'lgmac_theme_opts', 
		'lgmac_build_options_page'
	);

	include('includes/build-options-page.php');  // contient la fonction lgmac_build_options_page

	}   // fin fn lgmac_admin_menus

add_action('admin_menu', 'lgmac_admin_menus');


//=========================================================================
//==============                 sidebars and widgetized
//=========================================================================

function lgmac_widgets_init() {
	register_sidebar( array(
		'name'          => 'Footer Widget Zone',
		'description'   => 'Widgets affichés dans le footer: 4 au maximum',
		'id'            => 'widgetized-footer',
		'before_widget' => '<div id="%1$s" class="col-12 col-sm-6 col-lg-3 wrap-widget %2$s d-flex"><div class="inside-widget w-100 pb-3">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h2 class="h3 text-center">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'lgmac_widgets_init' );


//=========================================================================
//==============                  utilitaires
//=========================================================================
function lgmac_setup()  {

	//support des vignettes
	add_theme_support( 'post-thumbnails' );

	// crée format image slider front
	add_image_size('up-medium-true' , 500, 375, true ); 
	add_image_size('up-medium-false', 500, 375, false); 
	add_image_size('front-slider', 1140, 420, true);


	//enlève générateur de version
	remove_action('wp_head', 'wp_generator');

	// enlève les guillemets à la française
	remove_filter ('the_content', 'wptexturize');

	// support du titre
	add_theme_support( 'title-tag' );

	// Register Custom Navigation Walker
	require_once('includes/class-wp-bootstrap-navwalker.php');

	// active la gestion des menus
	register_nav_menus( array( 'primary' => 'principal') );	 

} // fin function lgmac_setup


add_action('after_setup_theme', 'lgmac_setup');


//=========================================================================
//===========   ajouter classe img-fluid à toutes les images incluses
//=========================================================================
function lgmac_add_img_class( $class ) {
      $class .= ' img-fluid'; // bien mettre un espace devant la chaine de caractères
      return $class;
}
add_filter('get_image_tag_class', 'lgmac_add_img_class');

//=========================================================================
//==============      ajoute la taille Medium Large dans la sélection
//=========================================================================

function my_images_sizes($sizes)  {     
	$addsizes = array(
		"medium_large" => "Medium Large",
		"up-medium-true"  => "Medium plus"
	);
	
	$newsizes = array_merge($sizes, $addsizes);
	return $newsizes;
		
}

add_filter('image_size_names_choose', 'my_images_sizes');		


//=========================================================================
//==============                 affichage date + catégorie(s)
//=========================================================================

// modèle du résultat  <time class="entry-date" datetime="2016-11-29T22:25:23+00:00">29 novembre 2016</time>

function lgmac_give_me_meta_01($date1, $date2, $cat, $tags)  {    

	$chaine  = 'publié le <time class="entry-date" datetime="';
	$chaine .= $date1;
	$chaine .= '">';
	$chaine .= $date2;
	$chaine .= '</time> dans la catégorie ';
	$chaine .= $cat;
	if (strlen($tags) > 0 ):
	$chaine .= ' avec les étiquettes: '. $tags;
	endif;

	return $chaine;

}


//=========================================================================
//==============   modifie le texte de  suite de l'excerpt
//=========================================================================
function lgmac_excerpt_more( $more ) {
	return ' <a class="more-link" href="' . get_permalink()    .'">' . ' [lire la suite]' . '</a>';
}
add_filter('excerpt_more', 'lgmac_excerpt_more');



//=========================================================================
//==============   CPT slider frontal page d'accueil
//=========================================================================

function lgmac_slider_init() {   
	
	$labels = array(
		'name' => 'Images Carousel Accueil',
		'singular_name' => 'Image accueil',
		'add_new' => 'Ajouter une image',
		'add_new_item' => 'Ajouter une Image accueil',
		'edit_item' => 'Modifier  une Image accueil',
		'new_item' => 'Nouveau',
		'all_items' => 'Voir la liste',
		'view_item' => 'Voir l\'élément',
		'search_item' => 'Chercher une Image accueil',
		'not_found' => 'Aucun élément trouvé',
		'not_found_in_trash' => 'Aucun élément dans la corbeille',
		'menu_name' => 'Slider Frontal'
		);
		
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' =>true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => false,
		'hierachical' => false,
		'menu_position' => 10,
		'menu_icon' =>  get_stylesheet_directory_uri() . '/assets/camera_16.png',
		'publicly_queryable' => false,
		'exclude_from_search' => true,
		'supports' => array('title', 'page-attributes', 'thumbnail')
	);
	
register_post_type('lgmac_slider', $args);
	
}  // end function lgmac_slider_init

add_action('init', 'lgmac_slider_init');



//================================================================================
//==============    ajout de l'image et ordre dans la colonne admin pour le slider
//================================================================================
//  

add_filter('manage_edit-lgmac_slider_columns', 'lgmac_col_change');  // change nom colonnes

function lgmac_col_change($columns)  {  
	$columns['lgmac_slider_image_order'] = "Ordre"; 
	$columns['lgmac_slider_image'] = "Image affichée";   

	return $columns;	
	}

add_action('manage_lgmac_slider_posts_custom_column', 'lgmac_content_show', 10 ,2);  // affiche contenu

function lgmac_content_show($column, $post_id)  { 
	global $post;  
	if ( $column == 'lgmac_slider_image' ) {
		echo the_post_thumbnail(array(200,100));	
		}
	if ( $column == 'lgmac_slider_image_order' ) {
		echo $post->menu_order;	
		}
	}


//================================================================================
//==============    tri auto sur l'ordre dans la colonne admin pour le slider
//================================================================================

function lgmac_change_slides_order($query){

    global $post_type, $pagenow; 

    if($pagenow == 'edit.php' && $post_type == 'lgmac_slider'){ 
        $query->query_vars['orderby'] = 'menu_order';
        $query->query_vars['order'] = 'asc';
    }   
}
add_action('pre_get_posts','lgmac_change_slides_order');




