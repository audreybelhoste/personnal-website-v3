<?php

/**
 * Mise en place de l'internationalisation du projet
 */
function ci_localization () {
    load_theme_textdomain('portfolio', get_template_directory() . '/lang');
}

/**
 * Fix a SPAM issue by setting PHPMailer "Sender" and "ReturnPath" same as "From"
 */
function ci_phpmailer_spam_fix ($phpmailer) {
    $phpmailer->Sender = $phpmailer->From;
    $phpmailer->ReturnPath = $phpmailer->From;
}

function ci_disable_comments () {
    
    add_action('admin_init', function () {
        // Redirect any user trying to access comments page
        global $pagenow;
      
        if ($pagenow === 'edit-comments.php') {
            wp_redirect(admin_url());
            exit;
        }
      
        // Remove comments metabox from dashboard
        remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
      
        // Disable support for comments and trackbacks in post types
        foreach (get_post_types() as $post_type) {
            if (post_type_supports($post_type, 'comments')) {
                remove_post_type_support($post_type, 'comments');
                remove_post_type_support($post_type, 'trackbacks');
            }
        }
    });
      
    // Close comments on the front-end
    add_filter('comments_open', '__return_false', 20, 2);
    add_filter('pings_open', '__return_false', 20, 2);
    
    // Hide existing comments
    add_filter('comments_array', '__return_empty_array', 10, 2);
    
    // Remove comments page in menu
    add_action('admin_menu', function () {
    	remove_menu_page('edit-comments.php');
    });
    
    // Remove comments links from admin bar
    add_action('init', function () {
        if (is_admin_bar_showing()) {
            remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
        }
    });
    
    add_action('wp_before_admin_bar_render', function() {
        global $wp_admin_bar;
        $wp_admin_bar->remove_menu('comments');
    });
}

/**
 * Disk space
 */
function add_disk_space_to_admin_bar( $admin_bar ) {

	$giga = 1024 * 1024 * 1024;
	$disk_space       		= foldersize( ABSPATH );
	$disk_space_formatted	= format_size( $disk_space );
	
	if($disk_space > 2 * $giga) {
		$color = 'red';
	}
	else if($disk_space > 1.5 * $giga) {
		$color = 'orange';
	} else {
		$color = 'lightgreen';
	}

	// add sub menu
	$args = array(
		'id'     => 'disk-space',
		'title'  => "Espace disque occupé : <span style='color:$color; font-weight: bold;'>$disk_space_formatted</span>"
	);
	$admin_bar->add_menu( $args );

	// add item upload
	$upload_dir     = wp_upload_dir(); 
	$upload_space   = foldersize( $upload_dir['basedir'] );
	$upload_space_formatted = format_size( $upload_space );
	$args = array(
		'parent' => 'disk-space',
		'id'     => 'disk-space-upload',
		'title'  => "• media ($upload_space_formatted)"
	);
	$admin_bar->add_node( $args );    
}

function foldersize( $path ) 
{
	$total_size = 0;
	$files = scandir( $path );
	$cleanPath = rtrim( $path, '/' ) . '/';

	foreach( $files as $t ) {
		if ( '.' != $t && '..' != $t ) 
		{
			$currentFile = $cleanPath . $t;
			if ( is_dir( $currentFile ) ) 
			{
				$size = foldersize( $currentFile );
				$total_size += $size;
			}
			else 
			{
				$size = filesize( $currentFile );
				$total_size += $size;
			}
		}   
	}

	return $total_size;
}

function format_size($size) 
{
	$units = explode( ' ', 'B KB MB GB TB PB' );

	$mod = 1024;

	for ( $i = 0; $size > $mod; $i++ )
		$size /= $mod;

	$endIndex = strpos( $size, "." ) + 3;

	return substr( $size, 0, $endIndex ) . ' ' . $units[$i];
}
/**
 * Disable the new user notification sent to the site admin
 */
function ci_disable_new_user_notifications() {
	//Remove original use created emails
	remove_action( 'register_new_user', 'wp_send_new_user_notifications' );
	remove_action( 'edit_user_created_user', 'wp_send_new_user_notifications', 10, 2 );
	
	//Add new function to take over email creation
	add_action( 'register_new_user', 'ci_send_new_user_notifications' );
	add_action( 'edit_user_created_user', 'ci_send_new_user_notifications', 10, 2 );
}
function ci_send_new_user_notifications( $user_id, $notify = 'user' ) {
	if ( empty($notify) || $notify == 'admin' ) {
	  return;
	}elseif( $notify == 'both' ){
    	//Only send the new user their email, not the admin
		$notify = 'user';
	}
	wp_send_new_user_notifications( $user_id, $notify );
}
/**
 * Disable notification after core update success
 */
function ci_stop_update_emails( $send, $type, $core_update, $result ) {
    if ( ! empty( $type ) && $type == 'success' ) {
        return false;
    }
    return true;
}

function ci_disable_sticky_post () {
    add_filter( 'pre_get_posts', function( $query ) {
        if ( ! is_admin() && $query->is_main_query() ) {
            $query->set( 'ignore_sticky_posts', 1 );
        }
    } );

    add_action( 'admin_print_styles', 'hide_sticky_option' );
        function hide_sticky_option() {
        global $post_type, $pagenow;
        if( 'post.php' != $pagenow && 'post-new.php' != $pagenow && 'edit.php' != $pagenow )
            return;
        ?>
            <style type="text/css">#sticky-span { display:none!important }
            .quick-edit-row .inline-edit-col-right div.inline-edit-col > :last-child > label.alignleft:last-child{ display:none!important; }</style>
        <?php
     }
}