<?php
  $socialNetworks = get_field('infos_reseaux_sociaux', 'infos');
  $adresse        = get_field('infos_adress', 'infos');
  $tel            = get_field('infos_tel', 'infos');
  $mail           = get_field('infos_mails', 'infos');
  $text           = get_field('infos_text_footer', 'infos');
?>

	</main>

  <footer class="footer bg-gray-900 text-white">
    <div class="container-fluid">
      <section class="row footer__newsletter align-items-center">
        <div class="col-sm-6">
          <h3 class="h4">S'abonner à notre newsletter</h3>
          <?php echo do_shortcode("[sibwp_form id=1]"); ?>
        </div>
        <div class="col-sm-6 d-none d-sm-flex justify-content-center">
          <picture class="footer__img">
            <source srcset="<?php echo get_template_directory_uri(); ?>/img/buiseness.webp" type="image/webp">
            <source srcset="<?php echo get_template_directory_uri(); ?>/img/buiseness.png" type="image/jpeg"> 
            <img src="<?php echo get_template_directory_uri(); ?>/img/buiseness.png" alt="Illustration d'ordinateur portable">
          </picture>
        </div>
      </section>
      <div class="row pt-6 pb-9 footer__nav">
        <div class="col-sm-6 col-lg-4">
          <div>
          <?php if ( has_custom_logo() ) :
            $logo = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ) );
          ?>
          <a class="footer__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="Logo du Conservatoire">
            <img src="<?php echo $logo[0]; ?>" class="style-svg"/>
          </a>
          <?php endif; ?>
          </div>
          <p class="text-small text-600"><?php echo $text; ?></p>
          <?php if ( $socialNetworks ) : ?>
            <ul class="sn -border -footer list-unstyled d-flex">
              <?php while(have_rows('infos_reseaux_sociaux', 'infos')): the_row();
                $reseau_social = get_sub_field('infos_reseau_social');
                $url = get_sub_field('infos_url_reseau_social');
              ?>
              <li class="mr-3">
                <a class="text-white d-flex justify-content-center align-items-center" href="<?php echo $url; ?>" aria-label="Notre page <?php echo $reseau_social; ?>">
                  <i class="icon-icon_<?php echo $reseau_social; ?>" aria-hidden="true"></i>
                </a>
              </li>
              <?php endwhile; ?>
            </ul>
          <?php endif; ?>
        </div>
        <div class="col-sm-6 offset-lg-2">
          <nav class="footer__menu row">
            <div class="col-6 col-sm-4">
              <h4 class="footer__title uppercase text-extrasmall mb-4">Numerica</h4>
              <?php wp_nav_menu( array(
                'theme_location' => 'footer-menu-1',
                'container'      => false,
                'menu_class'     => 'list-unstyled text-extrasmall',
                'depth'          => 1
              ) ); ?>
            </div>
            <div class="col-6 col-sm-4">
              <h4 class="footer__title uppercase text-extrasmall mb-4">Services</h4>
              <?php wp_nav_menu( array(
                'theme_location' => 'footer-menu-2',
                'container'      => false,
                'menu_class'     => 'list-unstyled text-extrasmall',
                'depth'          => 1
              ) ); ?>
            </div>
            <div class="col-6 col-sm-4">
              <h4 class="footer__title uppercase text-extrasmall mb-4">Presse</h4>
              <?php wp_nav_menu( array(
                'theme_location' => 'footer-menu-3',
                'container'      => false,
                'menu_class'     => 'list-unstyled text-extrasmall',
                'depth'          => 1
              ) ); ?>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </footer>
  
  <?php 
    wp_footer(); 
  ?>
</body>
</html>
