<?php 
function lgmac_save_options(){
    
    if(!current_user_can('publish_pages')){
        wp_die('Vous n\'etes pas autorise a effectuer cette operation');
    }
    check_admin_referer('lgmac_option_verify');

    $opts = get_option('lgmac_opts') ;

    // //sauvegarde légende 
    $opts['legend_01'] = sanitize_text_field($_POST["lgmac_legend_01"]);
    
    // //sauvegarde image
    $opts['image_01_url'] = sanitize_text_field($_POST["lgmac_image_url_01"]);

      update_option('lgmac_opts', $opts); 

     wp_redirect(admin_url('admin.php?page=lgmac_theme_opts&status=1'));

    exit;

}//fin fn lgmac_save_options
?>