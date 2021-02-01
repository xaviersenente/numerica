<?php
/**
 * Accroche une fonction ou une méthode à une action de filtrage spécifique.
 * All add_filter() calls.
 */


// Filtre les types de bloc autorisés par Gutenberg.
add_filter( 'allowed_block_types', 'numerica_gutenberg_blocks' );

add_filter( 'query_vars', 'numerica_register_query_vars' );

