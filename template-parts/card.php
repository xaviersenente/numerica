<?php

  $cptSlug = get_post_type( get_the_ID() );

  if ( $cptSlug == 'entreprise' ) {
    $urlCompany  = get_field('company_url');
    $logoCompany = get_field('company_logo');
  }

  if ( $cptSlug == 'evenement' ) {
    $dateformat    = 'l j F Y \à G\hi';
    $unixtimestamp = strtotime( get_field('date_event') );
    $date          = date_i18n( $dateformat, $unixtimestamp );
  }
  
 ?>

<article class="card overflow-hidden mr-5">
  <div class="d-flex">

    <?php if( has_post_thumbnail() ): ?>

      <div class="card__img d-none d-md-flex position-relative">
        <?php 
          the_post_thumbnail( 'card' ); 
          if ( $cptSlug == 'entreprise' ) : 
        ?>

          <div class="card__logo bg-white p-2 d-flex align-items-center">
            <?php echo wp_get_attachment_image( $logoCompany, 'logo' ); ?>
          </div>

        <?php endif; ?>

      </div>

    <?php endif; ?>

    <div class="card__caption bg-white p-5 flex-grow-1">
      <header class="card__header d-flex align-items-center text-extrasmall">

        <?php 
          if( $cptSlug == 'evenement' ) {
            $taxonomy = 'type_news';
          } elseif ( $cptSlug == 'entreprise' ) {
            $taxonomy = 'secteur';
          }
          $terms = get_the_terms( get_the_ID(), $taxonomy );
        ?>
        <?php if( $terms ): ?>

        <ul class="card__tags list-unstyled bg-secondary px-3 py-1 my-0">

          <?php foreach ( $terms as $term ) :
            $term_link = get_term_link( $term ); ?>

            <li class="card__tagItem d-inline-block">
              <a class="text-white" href="<?php echo $term_link; ?>">#&nbsp;<?php echo $term->name; ?></a>
            </li>

          <?php endforeach; ?>

        </ul>
        <?php endif; ?>
        
        <?php if( $terms[0]->slug == 'evenement' && get_field('date_event') ): ?>
         
          <div class="date ml-3"><?php echo $date; ?></div>

        <?php endif; ?>

      </header>
      <h3 class="h5">

        <?php if( $cptSlug == 'evenement' ) : ?>

          <a class="d-block" href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
          </a>

        <?php else : ?>

          <?php the_title(); ?>

        <?php endif; ?>
      </h3>

      <?php if( $cptSlug == 'entreprise' && $urlCompany || $cptSlug == 'evenement' ) : ?>
      <a class="moreLink" href="<?php if( $cptSlug == 'entreprise' ) { echo $urlCompany; } else { the_permalink(); } ?>">
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
      <?php endif; ?>
    </div>
  </div>
</article>