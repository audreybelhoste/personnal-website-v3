<?php

add_action('after_setup_theme', 'ci_setup_theme', 16);

function ci_setup_theme() {

	$directory_path = __DIR__ . "/includes/";

	$files = array();

	$iterator =
		new RegexIterator(
			new RecursiveIteratorIterator(
				new RecursiveDirectoryIterator($directory_path),
				RecursiveIteratorIterator::SELF_FIRST
			),
			'/^.+\.php$/i',
			RecursiveRegexIterator::GET_MATCH
		);

	foreach ($iterator as $file_path => $file_infos){
		$files[] = str_replace($directory_path, '', $file_path);
	}

	// Fichiers à exclure de l'import
	// Préciser le dossier après /includes (ex: 'api/connection.php' s'il est situé dans /includes/api/connection.php)
	$excluded_files = array(
		'hooks.php',
	);

	foreach ($files as $filename) {
		if (!in_array($filename, $excluded_files)) {
			require_once 'includes/' . $filename;
		}
	}

	require_once('includes/hooks.php');
}
