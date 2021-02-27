<?php if ( is_front_page() ) : ?>
  <?php if( have_rows('carousel') ): 
    $i = 0; ?>
    <div class="carouselHeader text-white">

    <?php while( have_rows('carousel') ) : the_row();
      $i++;
      $carouselTitle  = get_sub_field('carousel_title');
      $carouselIntro  = get_sub_field('carousel_intro');
      $carouselLink   = get_sub_field('carousel_link');
      $carouselImg    = get_sub_field('carousel_img'); ?>

      <article class="carouselHeader__item" id="itemCarouselHeader<?php echo $i; ?>">
        <div class="carouselHeader__img bg-dark">
          <?php echo wp_get_attachment_image( $carouselImg, 'full' ); ?>
        </div>
        <div class="carouselHeader__caption container-fluid h-100">
          <div class="row align-items-center h-100">
            <div class="col-md-8 col-lg-6">
              <h4 class="uppercase text-small text-white">Pôle numérique<br/>de bourgogne franche-comté</h4>
              <h2 class="carouselHeader__title h1"><?php echo $carouselTitle; ?></h2>
              <p class="carouselHeader__excerpt text-intro"><?php echo $carouselIntro; ?></p>
              <a class="btn -light carouselHeader__link" href="<?php print_r($carouselLink) ; ?>">En savoir plus</a>
            </div>
          </div>
        </div>
      </article>

    <?php endwhile; ?> 
  </div>
  <svg height="0" width="0" class="svg-clip">
    <defs>
      <!-- 
      Adding the clipPathUnits="objectBoundingBox" to the clipPath element.
      This sizes the polygon properly.
      -->
      <clipPath id="hero-clip" clipPathUnits="objectBoundingBox">
        <!-- utilize relative values for the points attribute -->
        <path fill="none" d="M0,0 L1,0 L1,0.95 Q0.5,1.05 0,0.95 Z"/>
      </clipPath>
    </defs>
  </svg>
  <?php endif; ?>  

<?php else : ?>

  <div class="bg-secondary hero d-flex align-items-end">
    <div class="container-fluid">
      <?php 
        if ( is_singular('evenement') && has_term( 'evenement', 'type_news', $post->ID ) ) : 
          $unixtimestamp = strtotime( get_field('date_event') );
          $date = date_i18n( "l j F Y \à G\hi", $unixtimestamp );
      ?>
        <h4 class="text-white"><?php echo $date; ?></h4>
      <?php endif; ?> 
      <h1 class="text-white hero__title mb-8">
        <?php numerica_display_page_title(); ?>
      </h1>
    </div>
  </div>
  <div class="menuSubPages">
    <div class="container-fluid">
      <ul class="d-md-flex py-3 uppercase list-unstyled">
        <?php  
          global $post; // if outside the loop
          if ( is_page() && $post->post_parent ) {
            global $id;
            $id = wp_get_post_parent_id( $id );
          } else {
            global $id;
          }
          wp_list_pages( array(
            'child_of' => $id,
            'title_li' => '',
            'depth'    => 1,
          ))
        ?>
      </ul>
    </div>
  </div>

<?php endif; ?>
