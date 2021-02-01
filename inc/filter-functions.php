<?php
/**
 * Theme functions that filter output.
 */


 /**
 * On définit les blocs disponnibles dans l'éditeur Gutenberg
 * et on désactive certaines de ses fonctionnalités
 */
function numerica_gutenberg_blocks() {
  return array(
		'core/paragraph',
		'core/heading',
		'core/quote',
		'core/list',
    'core/image',
    'core/file',
    'lazyblock/list-icon',
    'lazyblock/carousel',
    // 'core/table',
    // 'core/shortcode',
    // 'core/gallery',
  );
}

/**
 * Register custom query vars
 *
 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/query_vars
 */
function numerica_register_query_vars( $vars ) {
  $vars[] = 'categorySearch';
  // $vars[] = 'city';
  return $vars;
} 
