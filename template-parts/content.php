<?php
/**
 * Template part pour afficher les posts
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
?>
<?php get_template_part( 'template-parts/hero', 'hero' ) ?>

<div class="gutemberg container-fluid my-8">
	<?php the_content(); ?>
</div>

<?php if ( has_term( 'evenement', 'type_news', $post->ID ) ) : ?>
<section class="bg-gray-100 py-8">
	<div class="container-fluid">
		<h3>S'inscrire à l'évènement</h3>
		<?php gravity_form( 3, false, false, false, '', false ); ?>
	</div>
</section>
<?php endif; ?>
