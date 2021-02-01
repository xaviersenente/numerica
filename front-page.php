<?php 
  get_header();

  get_template_part( 'template-parts/hero', 'hero' );
?>
  <div class="container">
    <div class="searchFilter bg-white p-5">

    <?php echo do_shortcode( '[numerica_search_form]' ); ?>

    </div>
  </div>
  

<?php 
  get_template_part( 'template-parts/sections-page-builder', 'sections page builder' );
  get_template_part( 'template-parts/section-partner', 'partner' );

  get_footer(); 
?>
