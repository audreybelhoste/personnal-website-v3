<?php

/**
 * Theme setting
 */
function ci_create_custom_menus()
{
    if (function_exists('acf_add_options_page')) {

        acf_add_options_page(array(
            'page_title'     => __('Options Générales', 'portfolio'),
            'menu_title'     => __('Options Générales', 'portfolio'),
            'menu_slug'     => 'general-options',
            'update_button' => __('Mettre à jour', 'portfolio'),
            'updated_message' => __('Options mise à jour', 'portfolio'),
        ));
    }
}

// Hide update alerts for non-administrator users
function ci_hide_update_alerts_for_non_admin()
{
    // Choose the correct role where you need to block update nag
    if (!current_user_can('administrator')) {
        add_filter('pre_site_transient_update_core', '__return_null');
    }
}

//Remove menu entries for non-admin
function ci_remove_menus()
{
    //Check if the current request is for an administrative interface page
    if (is_admin()) {
        $author = wp_get_current_user();
        //If user is non admin
        if (!in_array('administrator', $author->roles)) {
            remove_menu_page('tools.php');
            remove_submenu_page('themes.php', 'themes.php');
            remove_menu_page('ci_analytics_settings');
            remove_menu_page('ci_analytics_services');

            //Remove customize
            global $submenu;
            if (isset($submenu['themes.php'])) {
                foreach ($submenu['themes.php'] as $index => $array_menu_item) {
                    foreach ($array_menu_item as $key => $menu_item) {
                        if (in_array($menu_item, ['Customize', 'Customizer', 'customize'])) {
                            unset($submenu['themes.php'][$index]);
                        }
                    }
                }
            }
        }
    }
}

/**
 * Déclaration des différents menus de navigation du site et ajout du lien "Apparence > Menus"
 */
function ci_register_menus()
{

    add_theme_support('menus');
    register_nav_menus(array(
        'main-nav'                    => __('Menu principal', 'portfolio'),
        'footer-main-nav'             => __('Menu pied de page', 'portfolio'),
        'footer-secondary-nav'        => __('Menu pied de page secondaire', 'portfolio'),
    ));
}
