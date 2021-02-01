<?php 
/*
Template Name: Demande de devis
*/
?>

<?php 
  get_header();
  get_template_part( 'template-parts/hero', 'hero' ); 
?>
<div class="container-fluid">
  <div class="row my-8">
    <div class="col-lg-8 offset-lg-2">
      <?php
        if ( have_posts() ) :
          while ( have_posts() ) :
            the_post();

            the_content();

            gravity_form( 1, false, false, false, '', false );

          endwhile;
        endif;
      ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>