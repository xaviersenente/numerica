<?php
/**
 * Fonction du thèmes
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 */

if ( ! function_exists( 'numerica_setup' ) ) {
	/**
	 * Configure les valeurs par défaut du thème et enregistre la prise en charge de diverses fonctionnalités WordPress.
	 */
	function numerica_setup() {
		/**
		 * Charge les chaînes traduites du thème
		 * @link https://developer.wordpress.org/reference/functions/load_theme_textdomain/
		 * 
		 * get_template_directory() renvoie l'url du répertoire du thème
		 * @link https://developer.wordpress.org/reference/functions/get_template_directory/
		 */
		load_theme_textdomain( 'numerica' );

		/**
		 * add_theme_support() enregistre la prise en charge du thème pour des fonctionnalités données.
		 * @link https://developer.wordpress.org/reference/functions/add_theme_support/
		 */
		// permet aux plugins et aux thèmes de gérer la balise de titre du document.
		add_theme_support( 'title-tag' ); 

		// permet la prise en charge des images mises en avant.
		add_theme_support( 'post-thumbnails' );

		// permet de rendre le code valide pour HTML5.
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		/**
		 * permet la prise en charge d'un logo personnalisé.
		 * @link https://developer.wordpress.org/themes/functionality/custom-logo/
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
    ) );
    
    // Désactive les tailles de police manuelles
    add_theme_support( 'disable-custom-font-sizes' );

    // Désactive les couleurs personnalisables
    add_theme_support( 'disable-custom-colors' );

    // supprime la palette de couleurs
    add_theme_support( 'editor-color-palette' );

    /**
     * La fonction add_image_size peprmet de définir de nouvelles tailles d'image
     * @link https://developer.wordpress.org/reference/functions/add_image_size/
     */

    add_image_size( 'card', 352, 448, true );
		add_image_size( 'team', 540, 800, true );
		add_image_size( 'carousel', 1400, 880, true );
    add_image_size( 'logo', 250 );
		
		/**
		 * Enregistre la prise en charge de certaines fonctionnalités pour un type de publication.
		 * @link https://developer.wordpress.org/reference/functions/add_post_type_support/
		 */
		// permet la prise en charge des extraits.
		add_post_type_support( 'page', 'excerpt' );

		/**
		 * Enregistre les emplacements du menu de navigation pour un thème.
		 * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
		 */
		register_nav_menus( array(
			'main-menu' => esc_html__( 'En-tête de page', 'numerica' ),
			'footer-menu-1' => esc_html__( 'Pied de page 1', 'numerica' ),
			'footer-menu-2' => esc_html__( 'Pied de page 2', 'numerica' ),
			'footer-menu-3' => esc_html__( 'Pied de page 3', 'numerica' )
		) );

		/**
		 * SHORTCODES
		 */

		// Shortcode pour la recherche selon critères
		add_shortcode( 'numerica_search_form', 'numerica_search_form' );
		
	}

}

function numerica_scripts() {
	/**
	 * wp_enqueue_style() et wp_enqueue_script() permettent de charger respectivement une feuille de style et un script. 
	 * Cette action s'effectue depuis la fonction wp_head() ou wp_footer()
	 * @link https://developer.wordpress.org/reference/functions/wp_enqueue_style/
	 * @link https://developer.wordpress.org/reference/functions/wp_enqueue_script/
	 * @link https://developer.wordpress.org/themes/basics/including-css-javascript/
	 */

	wp_enqueue_style( 'numerica-style', get_template_directory_uri() . '/dist/css/style.min.css' );

	wp_enqueue_script( 'numerica-vendors', get_template_directory_uri() . '/dist/js/vendors.min.js');
	wp_enqueue_script( 'numerica-scripts', get_template_directory_uri() . '/dist/js/script.js', array(), '', true );
	wp_enqueue_script( 'googlemap', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCgUykgzKaKTD4k5XaJ4cl2sdmRvBSLXP0' , '', null , true);
	wp_enqueue_script( 'gmap', get_template_directory_uri() . '/dist/js/gmap.js' , '', null, true );

	wp_localize_script( 'gmap', 'themeUri', get_template_directory_uri() );

}

/**
 * @link https://presscustomizr.com/snippet/three-techniques-to-alter-the-query-in-wordpress/
 */
function numerica_custom_query_vars( $query ) {
  // global $wp_query;

	if ( is_admin() || ! $query->is_main_query() ){
		return;
	} elseif ( $query->is_main_query() ) {

    if ( is_post_type_archive( 'evenement' ) ) {
      $today = date('Y-m-d H:i:s');
			$query->set( 'post_type', 'evenement' );
			$query->set( 'post_status', 'publish' );

      $query->set( 'orderby', 'date' );
			$query->set( 'order', 'DESC' );
			
      $query->set( 'meta_query', array(
				'relation' => 'OR',
        'event' => array (
					'key' => 'date_event',
					'value' 	=> $today,
					'compare' => '>=',
					'type' 		=> 'DATETIME',
				),
				'actu' => array (
					'key' 		=> 'type_event',
					'value' 	=> 'evenement',
					'compare' => 'NOT IN',
				)
      ));
		} 
		
		if ( is_tax( 'type_news', 'evenement' ) ) {
			$query->set( 'post_status', 'publish' );

      $query->set( 'orderby', 'date_event' );
			$query->set( 'order', 'ASC' );

			$query->set( 'tax_query', array(
				array (
					'taxonomy' => 'type_news',
					'field' => 'slug',
					'terms' => 'evenement'
				)
			));
			$query->set( 'meta_query', array(
				'event' => array (
					'key' => 'date_event',
					'value' => $today,
					'compare' => '>=',
					'type' => 'DATETIME'
				),
			));
		}
		return $query;
  }
  
}


/**
 * Build a custom query based on several conditions
 * The pre_get_posts action gives developers access to the $query object by reference
 * any changes you make to $query are made directly to the original object - no return value is requested
 *
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/pre_get_posts
 *
 */
function numerica_pre_get_posts( $query ) {
	// check if the user is requesting an admin page 
	// or current query is not the main query
	if ( is_admin() || ! $query->is_main_query() ){
		return;
	}

	$meta_query = array();
	$post_type = array( 'page', 'evenement');

	if( !empty( get_query_var( 'categorySearch' ) ) ) {
		$meta_query[] = array ( 
			'taxonomy' => 'category_search',
			'field' => 'slug',
			'terms' => get_query_var( 'categorySearch' )
		);
	}

	if( count( $meta_query ) > 1 ){
		$meta_query['relation'] = 'AND';
	}

	if( count( $meta_query ) > 0 ){
		$query->set( 'post_type', $post_type );
		$query->set( 'post_status', 'publish' );
		$query->set( 'tax_query', $meta_query );
	}

}