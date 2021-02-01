<?php 
  $optionContact  = get_field('option_contact');
  $optionDevis    = get_field('option_devis');
  $optionGmap     = get_field('option_gmap');

  if ( $optionContact ) : ?>
    <section class="bg-secondary text-white py-6">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col-md-6">
            <h3>Intéressé par nos services ?</h3>
            <?php if ( $optionDevis ) : ?>
              <p>Faites une demande de devis ou contactez notre équipe</p>
            <?php else : ?> 
              <p>Contactez notre équipe</p>
            <?php endif; ?> 
          </div>
          <div class="col-md-6 d-flex align-items-start justify-content-md-end">
            <?php if ( $optionDevis ) : ?>
              <a href="<?php echo esc_url( get_page_link( 365 ) ); ?>" class="btn -solid d-inline-block mr-3 mb-3">Demander un devis</a>
            <?php endif; ?> 
            <a href="<?php echo esc_url( get_page_link( 55 ) ); ?>" class="btn -white">Nous contacter</a>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>
  <?php if ( $optionGmap ) : 
    $location = get_field('infos_address', 'infos');
  ?>
    <div class="map" data-zoom="17">
      <div class="map__marker" data-lat="<?php echo esc_attr( $location['lat'] ); ?>" data-lng="<?php echo esc_attr( $location['lng'] ); ?>">
        <div class="map__infoWindows px-6">
          <h4 class="text-white my-3">Numerica</h4>
        </div>
        
      </div>
    </div>
  <?php endif; ?>