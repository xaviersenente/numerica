<?php get_header(); ?>

<?php get_template_part( 'template-parts/hero', 'hero' ) ?>

	<section class="section -marginBottom">
    <div class="grid">
      <div class="section__cards">

			<?php

				if( have_posts() ) : ?>
					
					<div class="container-fluid my-8">
						<div class="row">

						<?php while( have_posts() ) : the_post(); ?>

							<div class="col-lg-6 mb-6">

								<?php get_template_part('template-parts/card', 'card'); ?>

							</div>

						<?php endwhile; the_posts_pagination(); ?>

						<?php else :
							get_template_part( 'template-parts/content', 'none' );
						?>

						</div>
					</div>

				<?php endif; ?>
				
      </div>
    </div>
  </section>

<?php get_footer(); ?>