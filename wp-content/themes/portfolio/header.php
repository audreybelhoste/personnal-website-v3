<?php
/*
* Theme Name: © Portfolio Audrey Belhoste
* Author: Audrey Belhoste
* Version: 0.0.1
* Text Domain: portfolio
* Description: Header template
*			   Portfolio website for Audrey Belhoste
*/

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">

	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon.png">

	<?php wp_head(); ?>
	
</head>

<body id="body" <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">
<?php wp_body_open(); ?>
<?php //get_template_part('partials/header-nav');