<?php get_header(); ?>

	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

		endwhile;
	endif;
	?>

<?php get_template_part( 'template-parts/pre-footer', 'pre footer' ); ?>
<?php get_footer(); ?>
