<?php
/**
 * All add_action() calls.
 */

// Initialisation des fonctions personnalisées du thème.
add_action( 'after_setup_theme', 'numerica_setup' );

// File d'attente des styles et des scripts
add_action( 'wp_enqueue_scripts', 'numerica_scripts' );

// Pour activer la carte Google map
add_action('acf/init', 'google_map_api');

add_action( 'pre_get_posts', 'numerica_custom_query_vars' );

add_action( 'pre_get_posts', 'numerica_pre_get_posts', 1 );