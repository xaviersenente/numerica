<?php 
	get_header(); 
	get_template_part( 'template-parts/hero', 'hero' ); 
?>

	<div class="container-fluid my-8 main-column">

		<?php if ( have_posts() ) : 

			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'search' );

			endwhile;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

	</div>

<?php
get_footer();

