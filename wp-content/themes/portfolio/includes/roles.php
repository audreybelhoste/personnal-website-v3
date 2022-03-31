<?php
/**
 *    1. Utiliser le widget pour supprimer / mettre à jour les rôles
 *    2. Si il y a de nombreux rôles utiliser le plugin WPFront Role
 *    3. WooCommerce ou autre plugin spécifique => utiliser WPFront Role
 *    4. WPML => decommenter ligne WPML
 */

/**
 * Delete unused roles and admin_client to refresh it
 */
function ci_remove_roles( $role_name ) {

    $roles_to_remove = array( 
        'contributor',
        'editor',
        'author',
        'subscriber',
        'wpseo_manager',
        'wpseo_editor',
        'admin_client',
        $role_name
    );

    foreach($roles_to_remove as $role) {
        if( get_role( $role )) {
            remove_role( $role );
        }
    }

}

/**
 * Add new roles
 */
function ci_add_roles( $label, $role_name) {

    $dashboard_capabilities = array(
        'read'                      => true,
        'edit_dashboard'            => false,
    );

    $posts_capabilities = array(
        'publish_posts'             => true,
        'create_posts'              => true,
        'edit_posts'                => true,
        'delete_posts'              => true,
        'edit_published_posts'      => true,
        'delete_published_posts'    => true,
        'read_others_posts'         => true,
        'edit_others_posts'         => true,
        'delete_others_posts'       => true,
        'read_private_posts'        => true,
        'edit_private_posts'        => true,
        'delete_private_posts'      => true,
        'manage_categories'         => true,
    );

    $media_capabilities = array(
        'upload_files'              => true,
        'unfiltered_upload'         => false,
        'edit_attachments'          => true,
        'delete_attachments'        => true,
        'read_others_attachments'   => true,
        'edit_others_attachments'   => true,
        'delete_others_attachments' => true, 
    );

    $page_capabilities = array(
        'publish_pages'             => true,
        'create_pages'              => true,
        'edit_pages'                => true,
        'delete_pages'              => true,
        'edit_published_pages'      => true,
        'delete_published_pages'    => true,
        'read_others_pages'         => true,
        'edit_others_pages'         => true,
        'delete_others_pages'       => true,
        'read_private_pages'        => true,
        'edit_private_pages'        => true,
        'delete_private_pages'      => true, 
    );

    $comments_capabilities = array(
        'moderate_comments'         => true,
    );

    $themes_capabilities = array(
        'switch_themes'             => false,
        'edit_theme_options'        => true,
        'edit_themes'               => false,
        'delete_themes'             => false,
        'install_themes'            => false,
        'update_themes'             => false, 
    );

    $users_capabilities = array(
        'list_users'                => true,
        'create_users'              => true,
        'edit_users'                => true,
        'delete_users'              => true,
        'promote_users'             => true,
        'remove_users'              => true,
        'edit_users_higher_level'   => false,
        'delete_users_higher_level' => false,
        'promote_users_higher_level' => false,
        'promote_users_to_higher_level' => false, 
    );

    $tools_capabilities = array(
        'import'                    => false,
        'export'                    => false,
    );

    $admin_capabilities = array(
        'manage_options'            => false,
        'update_core'               => false,
        'unfiltered_html'           => true, 
    );

    $others_capabilities = array(
        'wpseo_manage_options'      => true,
        'nestedpages_sorting_post'  => true,
        'nestedpages_sorting_page'  => true,
        'edit_posts_role_permissions' => true,
        'wpseo_bulk_edit'           => true,
        'itsec_manage'              => false,
        'itsec_dashboard_menu'      => false,
        'rocket_purge_cache'        => false,
    );

    $wpml_capabilities = array(
        'wpml_manage_translation_management' => true,
        'wpml_manage_languages'              => true,
        'wpml_manage_theme_and_plugin_localization'=> true,
        'wpml_manage_support'                => true,
        'wpml_manage_woocommerce_multilingual'=> true,
        'wpml_operate_woocommerce_multilingual'=> true,
        'wpml_manage_media_translation'      => true,
        'wpml_manage_navigation'             => true,
        'wpml_manage_sticky_links'           => true,
        'wpml_manage_string_translation'     => true,
        'wpml_manage_translation_analytics'  => true,
        'wpml_manage_wp_menus_sync'          => true,
        'wpml_manage_taxonomy_translation'   => true,
        'wpml_manage_troubleshooting'        => true,
        'wpml_manage_translation_options'    => true,
    );

    $gform_capabilities = array(
        'gravityforms_create_form'  => true,
        'gravityforms_delete_forms' => true,
        'gravityforms_edit_forms'   => true,
        'gravityforms_preview_forms' => true,
        'gravityforms_view_entries' => true,
        'gravityforms_edit_entries'	=> true,
        'gravityforms_delete_entries' => true,
        'gravityforms_view_entry_notes' => true,
        'gravityforms_edit_entry_notes'	=> true,
        'gravityforms_export_entries' => true,
        'gravityforms_view_settings' => false,
        'gravityforms_edit_settings' => false,
        'gravityforms_view_updates' => false,
        'gravityforms_view_addons'  => false,
        'gravityforms_system_status' => false,
        'gravityforms_uninstall'    => false,
        'gravityforms_logging'      => false,
        'gravityforms_api_settings' => false,
    );

    $roles = array(
        array(
            //Admin client
            'role' => $role_name,
            'display_name' => $label,
            'capabilities' => array_merge( 
                $dashboard_capabilities,
                $posts_capabilities,
                $media_capabilities,
                $page_capabilities,
                $comments_capabilities,
                $themes_capabilities,
                $users_capabilities,
                $tools_capabilities,
                $admin_capabilities,
                $others_capabilities,
                $gform_capabilities,
                /* $wpml_capabilities, */
            ),
        ),
    );

    foreach( $roles as $role ) {
        add_role( $role['role'], $role['display_name'], $role['capabilities'] );
    }

}

function add_dashboard_role_widget() {
    if(current_user_can( 'manage_options')) {
        wp_add_dashboard_widget( 'roles_widget', __('Rôles utilisateurs'), 'roles_widget_function' );
    }
}

function roles_widget_function() {

    if (isset($_POST['my_upload_roles']) && check_admin_referer('my_upload_roles_clicked')) {
        $label = isset($_POST['label']) ? $_POST['label'] : 'Admin client';
        $role = isset($_POST['role']) ? $_POST['role'] : 'admin_client';
        ci_remove_roles( $label, $role );
        ci_add_roles( $label, $role );
    }

    echo '<style>#update-roles input:not([type="submit"]){margin:6px 0 12px;}form.my-border-bottom{margin-top:12px;padding-bottom:12px;margin-bottom:12px;border-bottom:solid 1px #eee}ul.my-border-bottom{border-bottom:solid 1px #eee}</style>';

    echo '<div id="update-roles">';

    echo '<strong>'.__('Rôles enregistrés sur le site : ', 'portfolio').'</strong>';

    global $wp_roles;
    $roles = $wp_roles->roles;
    echo '<ul class="my-border-bottom">';
    foreach($roles as $role) {
        echo '<li><em>'.$role['name'].'</em></li>';
    }
    echo '</ul>';
    echo '<strong>'.__('Ajouter / Mettre à jour les rôles', 'portfolio').'</strong>';
    echo '<form action="'.get_dashboard_url().'" method="post" class="my-border-bottom">';

    echo '<div class="input-text-wrap">';
    echo '<label for="label">'.__('Nom affiché', 'portfolio').'</label>';
    echo '<input type="text" value="Admin '.get_bloginfo('name').'" name="label" id="label" />';
    echo '</div>';

    echo '<div class="input-text-wrap">';
    echo '<label for="role">'.__('Rôle', 'portfolio').'</label>';
    echo '<input type="text" value="admin_client" name="role" id="role" />';
    echo '</div>';

    wp_nonce_field( 'my_upload_roles_clicked' );
    echo '<input type="hidden" value="true" name="my_upload_roles" />';

    submit_button(__('Mettre à jour les rôles', 'portfolio'));

    echo '</form>';

    echo '<p>'.__('Mettre à jour supprime les rôles de bases.<br>Les rôles et capability sont modifiables dans <em>includes/roles.php</em>', 'portfolio').'</p>';

    echo '</div>';
}