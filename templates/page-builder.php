<?php 
/*
Template Name: Page builder
*/
?>

<?php 
  get_header();

  get_template_part( 'template-parts/hero', 'hero' );
  get_template_part( 'template-parts/sections-page-builder', 'sections page builder' ); 
  get_template_part( 'template-parts/pre-footer', 'pre footer' );

  get_footer();
?>