<?php 
/*
Template Name: Contact
*/
?>

<?php 
  get_header();
  get_template_part( 'template-parts/hero', 'hero' ); 

  $socialNetworks = get_field('infos_reseaux_sociaux', 'infos');
  $location       = get_field('infos_address', 'infos');
  $tel            = get_field('infos_tel', 'infos');
  $mails          = get_field('infos_mails', 'infos');

?>
  <div class="container-fluid my-8">
    <div class="row">
    
      <div class="col-md-4">
        <h3>Contactez nous</h3>
        <?php if ( $location ) {
          $address = '';
          foreach( array('street_number', 'street_name', 'city', 'state', 'post_code', 'country') as $i => $k ) {
              if( isset( $location[ $k ] ) ) {
                  $address .= sprintf( '<span class="segment-%s">%s</span>, ', $k, $location[ $k ] );
              }
          }
          // Trim trailing comma.
          $address = trim( $address, ', ' );
          // Display HTML.
          echo '<h4>Adresse</h4>';
          echo '<p>' . $address . '.</p>';
        } ?>

        <?php if ( $tel ) {
          echo '<h4>Téléphone</h4>';
          echo '<p>' . $tel . '.</p>';
        } ?>

        <?php if ( $mails ) : ?>
          <h4>E-mails</h4>

          <ul class="list-unstyled">
          <?php while(have_rows('infos_mails', 'infos')): the_row();
            $mail = get_sub_field('infos_mail');
          ?>
            <li>
              <a href="mailto:<?php echo $mail; ?>"> <?php echo $mail; ?></a>
            </li>
          <?php endwhile; ?>
          </ul>
          
        <?php endif; ?>
        <?php if ( $socialNetworks ) : ?>
          <h4>Suivez nous</h4>
          <ul class="sn -border list-unstyled d-flex">
            <?php while(have_rows('infos_reseaux_sociaux', 'infos')): the_row();
              $reseau_social = get_sub_field('infos_reseau_social');
              $url = get_sub_field('infos_url_reseau_social');
            ?>
            <li class="mr-3">
              <a class="d-flex justify-content-center align-items-center" href="<?php echo $url; ?>" aria-label="Notre page <?php echo $reseau_social; ?>">
                <i class="icon-icon_<?php echo $reseau_social; ?>" aria-hidden="true"></i>
              </a>
            </li>
            <?php endwhile; ?>
          </ul>
        <?php endif; ?>
      </div>
      <div class="col-md-8">
        <?php
          if ( have_posts() ) :
            while ( have_posts() ) :
              the_post();

              the_content();

              gravity_form( 2, false, false, false, '', false );

            endwhile;
          endif;
          ?>
      </div>
    </div>
  </div>
	
<?php get_template_part( 'template-parts/pre-footer', 'pre footer' ); ?>
<?php get_footer(); ?>