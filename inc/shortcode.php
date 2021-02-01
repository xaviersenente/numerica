<?php
/** 
* Pour une recherche multi critères avancée voir le lien ci-dessous
* @link https://www.smashingmagazine.com/2016/03/advanced-wordpress-search-with-wp_query/
*
*/

function numerica_search_form( $args ){
  $args = array( 'hide_empty' => false );
  $typology_terms = get_terms( 'category_search', $args );
  if( is_array( $typology_terms ) ){
    $select_typology = '<label for="categorySearch" class="sr-only">Catégorie</label>';
    $select_typology .= '<select class="form-control mb-0" name="categorySearch" id="categorySearch">';
    foreach ( $typology_terms as $term ) {
        $select_typology .= '<option value="' . $term->slug . '">' . $term->description . '</option>';
    }
    $select_typology .= '</select>' . "\n";
  }

  $output = '<form class="d-md-flex align-items-center justify-content-center" action="' . esc_url( site_url() ) . '" method="GET" role="search">';
  $output .= '<span class="mr-3">Je suis à la recherche </span>';
  $output .= '<span class="smselectbox d-flex mr-3">' . $select_typology . '</span>';
  $output .= '<button type="submit" class="btn">Rechercher</button></form>';

  return $output;
}