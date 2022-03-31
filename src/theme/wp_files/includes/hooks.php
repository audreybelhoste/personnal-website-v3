<?php

/*************************************
 * Assets
 */
   add_action('wp_enqueue_scripts', 'ci_assets');
   //add_action('login_enqueue_scripts', 'ci_wpm_login_style');

   //Disable emoji scripts and gutemberg blocks loading
   remove_action('wp_head', 'print_emoji_detection_script', 7);
   remove_action('wp_print_styles', 'print_emoji_styles');
   remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
   remove_action( 'admin_print_styles', 'print_emoji_styles' );
   add_action( 'wp_enqueue_scripts', 'ci_remove_scripts', 100 );


/*************************************
 * Images
 */

   // This will remove the default image sizes medium, medium_large and large. 
   add_filter( 'intermediate_image_sizes_advanced', 'prefix_remove_default_images' );
  
   add_filter( 'wp_check_filetype_and_ext', 'ci_rewrite_img_svg', 100, 4);
   add_filter('upload_mimes', 'ci_allow_svg_mime_types');
   ci_add_thumbnails();


/*************************************
 * Menus
 */
   add_action('admin_head','ci_hide_update_alerts_for_non_admin');
   ci_create_custom_menus();
   add_action('admin_menu', 'ci_remove_menus', 999);
   ci_register_menus();


/*************************************
 * Miscellaneous
 **/
   ci_localization();
   add_action( 'phpmailer_init', 'ci_phpmailer_spam_fix');
   ci_disable_comments();
   add_action( 'init', 'ci_disable_new_user_notifications' );
   remove_action( 'after_password_reset', 'wp_password_change_notification' );
   add_filter( 'auto_plugin_update_send_email', '__return_false' );
   add_filter( 'auto_theme_update_send_email', '__return_false' );
   add_filter( 'auto_core_update_send_email', 'ci_stop_auto_update_emails', 10, 4 );
   ci_disable_sticky_post();



/*************************************
 * Tiny MCE
 */
   // Load front css into editor
   add_editor_style('css/main.css');

   add_filter('tiny_mce_before_init', 'ci_custom_tinyMCE_menu_bar');
   //add_filter('tiny_mce_plugins', 'ci_wpse_tiny_mce_remove_custom_colors');


/*************************************
 * SEO
 */
   add_filter( 'wpseo_metabox_prio', 'ci_yoast_to_bottom');

   //Retirer la meta de wordpress generator (ex : <meta name="generator" content="WordPress 5.6.1">)
   remove_action('wp_head', 'wp_generator');


/*************************************
 * Gravity Forms
 */ 
   add_filter('gform_pre_send_email', 'ci_before_email');
   add_filter('gform_notification', 'ci_change_notification_email', 10, 3 );
   add_filter( 'gform_submit_button', 'form_submit_button', 10, 2 );

/*************************************
 * Roles
 */
   add_action( 'wp_dashboard_setup', 'add_dashboard_role_widget', 10 );

   
/*************************************
 * Disk space
 */
// add_action( 'admin_bar_menu', 'add_disk_space_to_admin_bar', 1000);


