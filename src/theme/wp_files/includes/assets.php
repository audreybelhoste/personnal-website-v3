<?php

function ci_assets() {

    /*
    * CSS
    */
    $css =	array(
        'main' => '/css/main.css',
    );
    foreach ($css as $css_name => $css_path){
        //version = file last modification's timestamp
        $ver = (file_exists(get_template_directory() . $css_path)) ? filemtime(get_template_directory() . $css_path) : false;

        wp_enqueue_style(
            $css_name,
            get_template_directory_uri() . $css_path,
            array(),
            $ver
        );
    }

    /*
    * JS
    */
    $js =	array(
        'ci_main'	=> array('url' => '/js/main.js', 'deps' => array('jquery'))
    );

    // use jquery 3.6.0
    wp_deregister_script('jquery');
    wp_register_script('jquery', ('https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js'), false, null, false);
    wp_enqueue_script('jquery');

    foreach ($js as $js_name => $js){
        //version = file last modification's timestamp
        $ver = (file_exists(get_template_directory() . $js['url'])) ? filemtime(get_template_directory() . $js['url']) : false;

        wp_enqueue_script(
            $js_name,
            get_template_directory_uri() . $js['url'],
            $js['deps'],
            $ver,
            true
        );
    }

    wp_localize_script('ci_main', 'MyAjax', array('ajaxurl' => admin_url( 'admin-ajax.php')));

}

function ci_remove_scripts(){
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-block-style' ); // Remove WooCommerce block CSS
}

/**
 * Style personnalisé pour la page d'accueil WP-admin
 */
function ci_wpm_login_style() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            display: block;
            background-image: url("<?=get_template_directory_uri()?>/images/LOGO_A_METTRE_ICI");
            background-size: contain;
			background-position: center;
            width: 300px;
        }
        .button-primary {
            background-color: COULEUR!important;
            border-color: COULEUR!important;
            transition: .3s ease;
        }
        .button-primary:hover {
            background-color: COULEUR!important;
            border-color: COULEUR!important;
        }

    </style>
<?php }