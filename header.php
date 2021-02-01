<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <header class="header d-flex align-items-stretch justify-content-between justify-content-md-start px-5 headroom">
    <div class="header__start d-flex align-items-center">
      <?php if ( has_custom_logo() ) :
          
          $logo = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ) );
        
      ?>
      <a class="header__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="Logo du Conservatoire">
        <img src="<?php echo $logo[0]; ?>" class="style-svg"/>
      </a>
      <?php endif; ?>
      
    </div>
    <div class="header__end d-flex w-100 justify-content-md-between align-items-center">
      <button class="header__menuBtn menuBurger" aria-label="menu" aria-expanded="false" aria-controls="mainNav"><span class="menuBurger__bar" aria-hidden="true"></span></button>
      <nav class="header__menu menu" id="mainNav" aria-label="Menu principal">
        <?php wp_nav_menu( array(
          'theme_location' => 'main-menu',
          'container'      => false,
          'menu_class'     => 'menu__list',
          'depth'          => 2,
          'walker'         => new Header_Walker_Nav_Menu()
        ) );
        ?>
      </nav>
      <div class="d-md-flex">
        <?php 
          $socialNetworks = get_field('infos_reseaux_sociaux', 'infos');
          if ( $socialNetworks ) : ?>
          <ul class="sn -header list-unstyled d-none d-md-flex">
            <?php while(have_rows('infos_reseaux_sociaux', 'infos')): the_row();
              $reseau_social = get_sub_field('infos_reseau_social');
              $url = get_sub_field('infos_url_reseau_social');
            ?>
            <li class="mr-3">
              <a class="d-flex text-white justify-content-center align-items-center" href="<?php echo $url; ?>" aria-label="Notre page <?php echo $reseau_social; ?>">
                <i class="icon-icon_<?php echo $reseau_social; ?>" aria-hidden="true"></i>
              </a>
            </li>
            <?php endwhile; ?>
          </ul>
        <?php endif; ?>
        <button class="header__search d-flex justify-content-center align-items-center" aria-label="Rechercher">
          <svg width="24" height="24" aria-hidden="true" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="11" cy="10" r="7" stroke="#191919" stroke-width="2" />
            <path stroke="#191919" stroke-width="2" d="M17.707 17.293l3.536 3.535" />
          </svg>
        </button>
        <?php get_search_form(); ?>
      </div>
    </div>
    
  </header>
  <main>

