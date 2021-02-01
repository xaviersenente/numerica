<?php get_header(); ?>

<?php get_template_part( 'template-parts/hero', 'hero' ) ?>

<div class="gutemberg container-fluid my-8">
  <div class="mx-auto w-50 py-8">
    <?php $upload_dir   = wp_upload_dir(); ?>
    <img class="style-svg" src="<?php echo $upload_dir['baseurl'].'/2020/08/Error_404_SVG.svg' ?>" alt="404"/>
  </div>
</div>

<?php get_footer(); ?>