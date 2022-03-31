<?php

/**
 * Fonctions supplémentaires disponibles dans la documentation Documize
 * https://concept-image.documize.com/s/c493bukp0nhtab62m2v0/base-de-connaissances-code
 */

/**
 * Génère et echo une balise <picture> pour une image wordpress, en gérant les formats webp générés par Imagify
 * Exemple d'utilisation
 * <?php display_picture(
 * 		$image,
 * 		'image_tablet',
 * 		$sizes_list = array(
 * 			'image_hd'		=> '(min-width: 1920px)',
 * 			'image_mobile'	=> '(max-width: 400px)'
 * 		),
 * 		$picture_class = "pictureClass",
 * 		$picture_id = "pictureId",
 * 		$img_class = "imgClass",
 * 		$img_id = "imgId"
 * ); ?>
 * @param array		$img			Image wordpress format array
 * @param string	$thumbnail_size	Nom de de la thumbnail size de l'image de fallback
 * @param array		$sizes_list		Tableau clé => valeur pour les différentes tailles d'images, avec les thumbnail size en clé et les média query en valeur
 * @param string	$picture_class	Class css de la balise <picture>
 * @param string	$picture_id		Id de la balise <picture>
 * @param string	$img_class		Class css de la balise <img>
 * @param string	$img_id 		Id de la balise <img>
 */
function display_picture(
	array $img,
	string $thumbnail_size,
	array $sizes_list = array(),
	string $picture_class = "",
	string $picture_id = "",
	string $img_class = "",
	string $img_id = ""
){

	$picture_tag = "<picture";
	$picture_tag .= $picture_class ? " class=\"$picture_class\"" : "";
	$picture_tag .= $picture_id ? " id=\"$picture_id\"" : "";
	$picture_tag .= ">";

	// .webp sources
	foreach($sizes_list as $size => $media_query){
		$picture_tag .= "<source";
		$picture_tag .= " type=\"image/webp\"";
		$picture_tag .= " srcset=\"" . $img['sizes'][$size] . ".webp\"";
		$picture_tag .= " media=\"" . $media_query ."\"";
		$picture_tag .= ">";
	}

	// .webp source for default size
	$picture_tag .= "<source";
	$picture_tag .= " type=\"image/webp\"";
	$picture_tag .= " srcset=\"" . $img['sizes'][$thumbnail_size] . ".webp\"";
	$picture_tag .= ">";

	// original sources
	foreach($sizes_list as $size => $media_query){
		$picture_tag .= "<source";
		$picture_tag .= " type=\"" . $img['mime_type'] . "\"";
		$picture_tag .= " srcset=\"" . $img['sizes'][$size] . "\"";
		$picture_tag .= " media=\"" . $media_query ."\"";
		$picture_tag .= ">";
	}

	$picture_tag .= "<img";
	$picture_tag .= " src=\"" . $img['sizes'][$thumbnail_size] . "\"";
	$picture_tag .= $img['alt'] ? " alt=\"" . $img['alt'] . "\"" : "";
	$picture_tag .= $img_class ? " class=\"" . $img_class . "\"" : "";
	$picture_tag .= $img_id ? " id=\"" . $img_id . "\"" : "";
	$picture_tag .= ">";


	$picture_tag .= "</picture>";

	echo $picture_tag;
}

/**
 * Custom pagination
 */
function custom_pagination($numpages = '', $pagerange = '', $paged = '') {

	if (empty($pagerange)) {
	  $pagerange = 2;
	}
  
	global $paged;
	if (empty($paged)) {
	  $paged = 1;
	}
	if ($numpages == '') {
	  global $wp_query;
	  $numpages = $wp_query->max_num_pages;
	  if(!$numpages) {
		  $numpages = 1;
	  }
	}
  
	$pagination_args = array(
		'format'          => 'page/%#%',
		'total'           => $numpages,
		'current'         => $paged,
		'show_all'        => false,
		'end_size'        => 1,
		'mid_size'        => $pagerange,
		'prev_next'       => true,
		'prev_text'       => __( '<', 'portfolio' ),
		'next_text'       => __( '>', 'portfolio' ),
		'type'            => 'plain',
		'add_args'        => false,
		'add_fragment'    => ''
	);
  
	$paginate_links = paginate_links($pagination_args);
  
	if ($paginate_links) {
	  echo "<nav class='pagination'>";
		echo $paginate_links;
	  echo "</nav>";
	}
  
}