jQuery(document).ready(function($) { 



    /* *************************************************************  */
    /*                  ajout image dans page                         */
    /* *************************************************************  */
    var frame      =  wp.media({
            title: 'Sélectionner une image', 
            button:  {
                text: 'Utiliser ce Média'
                },
            multiple: false
            });


    $("#form-lgmac-options #btn_img_01").click(function(e)  {  
        e.preventDefault();

        frame.open();
    });

    frame.on('select', function() {

        var objImg  = frame.state().get('selection').first().toJSON(); 

        var mon_url = objImg.sizes.medium_large.url;

        $("img#img_preview_01").attr('src', mon_url);
        $("input#lgmac_image_01").attr('value', mon_url);
        $("input#lgmac_image_url_01").attr('value', mon_url);


    });

});  // fin du ready jQuery