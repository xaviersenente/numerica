<?php
/**
 * Template part for displaying results in search pages
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
  $cptSlug = get_post_type( get_the_ID() );
?>

<article class="searchResult mb-5 pb-5">

	<div class="searchResult__type uppercase ltr-sp-05 text-500 fw-600">
		<?php 
			$post_type_obj = get_post_type_object( get_post_type() );
			echo $post_type_obj->labels->singular_name; ?>
		</div>
	<?php the_title( sprintf( '<h2 class="searchResult__title h3"><a href="%s" class="searchResult__titleLink" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
  <p class="searchResult__chapo"><?php the_excerpt(); ?></p>
  <a class="searchResult__link moreLink" href="<?php if( $cptSlug == 'entreprise' ) { echo $urlCompany; } else { the_permalink(); } ?>">
    <span class="moreLink__arrow -left">
      <span class="shaft"></span>
    </span>
    <span class="moreLink__main">
      <span class="moreLink__text">
        <?php if( $cptSlug == 'entreprise' ) { echo 'Site web'; } else { echo 'En savoir plus'; } ?>
      </span>
      <span class="moreLink__arrow -right">
        <span class="shaft"></span>
      </span>
    </span>
  </a>

</article>

