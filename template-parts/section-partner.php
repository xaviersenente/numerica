<?php  
  $args = array(
    'post_type' => 'actionnaires'
  );
  query_posts( $args );
  if(have_posts()) : ?>
    <section class="section-programme py-8">
      <div class="container-fluid">
        <div class="py-6">
          <h2 class="text-center">Actionnaires</h2>
        <?php
          $mainPartners = get_posts( array(
            'post_type' => 'actionnaires',
            'meta_query' => array(
              array(
                'key'   => 'type_partner',
                'value' => '1',
              )
            )
          )); ?>

          <?php if( $mainPartners ) : ?>
            <div class="carouselPartner -main" data-flickity='{ "cellAlign": "center", "contain": true, "groupCells": true, "pageDots": false, "prevNextButtons": false }'>
            <?php foreach( $mainPartners as $post ) : ?>
              <div class="carouselPartner__item w-sm-20 w-30 d-flex align-items-center">
                <a href="<?php echo get_field( 'url_partner' ); ?>" class="carouselPartner__link d-flex h-100 p-sm-5 p-2">
                  <?php the_post_thumbnail( 'logo', [ 'class' => 'carouselPartner__logo' ] ); ?>
                </a>
              </div>
            <?php endforeach; ?>
            </div>
          <?php endif; ?>

        <?php
          $minorPartners = get_posts( array(
            'post_type' => 'actionnaires',
            'posts_per_page' => -1,
            'meta_query' => array(
              array(
                'key'   => 'type_partner',
                'value' => '0',
              )
            )
          )); ?>

          <?php if( $minorPartners ) : ?>
            <div class="carouselPartner -minor"  data-flickity='{ "cellAlign": "left", "wrapAround": true, "groupCells": false, "pageDots": false, "prevNextButtons": false, "autoPlay": true }'>
            <?php foreach( $minorPartners as $post ) : ?>
              <div class="carouselPartner__item w-sm-20 w-25 d-flex align-items-center">
                <a href="<?php echo get_field( 'url_partner' ); ?>" class="carouselPartner__link d-flex h-100 p-sm-5 p-2">
                  <?php the_post_thumbnail( 'logo', [ 'class' => 'carouselPartner__logo' ] ); ?>
                </a>
            </div>
            <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </section>
  <?php endif; wp_reset_query(); ?>

