<?php

function ci_custom_tinyMCE_menu_bar($init_array) {

    // Add custom buttons formats
    $init_array['style_formats'] = json_encode(array(
        array(
            'title' => __('Bouton jaune', '@@themeName'),
            'classes' => 'btn',
            'selector' => 'a'
        ),
        array(
            'title' => __('Bouton blanc', '@@themeName'),
            'classes' => 'btn-light',
            'selector' => 'a'
        ),
    ));

    // Custom text formats
    $init_array['block_formats'] = 'Paragraphe=p;Titre niveau 2=h2;Titre niveau 3=h3;';

    // Custom text colors
    // $init_array['textcolor_map'] = '[
    //     "E25303", "Couleur primaire",
    // 	"121212", "Couleur secondaire",
    // ]';
    // $init_array['textcolor_rows'] = 1;


    return $init_array;
}

// Remove custom color picker
function ci_wpse_tiny_mce_remove_custom_colors( $plugins ) {
    foreach ( $plugins as $key => $plugin_name ) {
        if ( 'colorpicker' === $plugin_name ) {
            unset( $plugins[ $key ] );
            return $plugins;
        }
    }
    return $plugins;
}