<?php

if( function_exists('acf_add_options_page') ) {
	/**
	 * Ajoute une page d'options au menu d'administration.
	 * Les pages d'options sont utilisées pour stocker les paramètres globaux. 
	 * Ces paramètres ne sont pas liés à une publication spécifique, mais sont stockés dans la table wp_options.
	 * @link https://www.advancedcustomfields.com/resources/acf_add_options_page/
	 */
	acf_add_options_page([
		'page_title' => 'Infos générales',
		'menu_title' => 'Infos',
		'menu_slug' => 'infos-site',
		'capability' => 'edit_posts',
		'parent_slug' => '',
		'position' => 3,
		'icon_url' => false,
		'redirect' => false,
		'post_id' => 'infos',
		'autoload' => false,
		'update_button' => 'Mettre à jour',
	]);
}

/* Pour activer la carte Google map */
function google_map_api() {
  acf_update_setting('google_api_key', 'AIzaSyCgUykgzKaKTD4k5XaJ4cl2sdmRvBSLXP0');
}
