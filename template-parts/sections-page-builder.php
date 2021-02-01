<?php 
if( have_rows('section') ):
  while( have_rows('section') ): the_row();
    if( get_row_layout() == 'sec_txt_img' ): 
      $label        = get_sub_field('sec_txt_img_label');
      $title        = get_sub_field('sec_txt_img_title');
      $intro        = get_sub_field('sec_txt_img_intro');
      $link         = get_sub_field('sec_txt_img_link');
      $image        = get_sub_field('sec_txt_img_illustration');
      $orientation  = get_sub_field('sec_txt_img_dir');
      ?>

      <section class="scProgramme py-sm-8 py-2">
        <div class="container-fluid">
          <div class="row py-6 <?php if($orientation) { echo 'flex-row-reverse'; }; ?>">
            <div class="col-md-5 px-8 offset-md-1">
              <?php echo wp_get_attachment_image( $image, 'full', "", ["class" => "style-svg"] ); ?>
            </div>
            <div class="col-md-5">
              <p class="text-primary uppercase text-extrasmall ltr-sp-1"><?php echo $label; ?></p>
              <h2 class="filet"><?php echo $title; ?></h2>
              <p><?php echo $intro; ?></p>
              <?php if( $link ) : ?>
              <a class="moreLink" href="<?php echo $link; ?>">
                <span class="moreLink__arrow -left">
                  <span class="shaft"></span>
                </span>
                <span class="moreLink__main">
                  <span class="moreLink__text">En savoir plus</span>
                  <span class="moreLink__arrow -right">
                    <span class="shaft"></span>
                  </span>
                </span>
              </a>
              <?php endif; ?>
            </div>
            
          </div>
        </div>
      </section>

    <?php elseif( get_row_layout() == 'sec_cpt' ): 
      $title    = get_sub_field('sec_cpt_title');
      $link     = get_sub_field('sec_cpt_link');
      $btn      = get_sub_field('sec_cpt_btn');
      $cpt      = get_sub_field('sec_cpt_list');
      $color    = get_sub_field('sec_cpt_color');
      $cptType  = get_sub_field('sec_cpt_type');
      $cptState = get_sub_field('sec_cpt_state');
      
    ?>

      <section class="<?php if( $cpt['value'] == 'entreprise' ) { echo 'scCompany'; } else { echo 'scActu'; } ?> py-8 overflow-hidden <?php if($color) { echo 'bg-gray-100'; } else { echo 'bg-secondary'; }; ?>">
        <div class="container-fluid">
          <h2 class="<?php if(!$color) { echo 'text-white'; }; ?>"><?php echo $title; ?></h2>

          <?php
            if( $cpt['value'] == 'entreprise' ) {
              $args = array(
                'post_type' => 'entreprise',
                'posts_per_page' => 6,
                'orderby' => array ( 
                  'date' => 'DESC' 
                ),
                'tax_query' => array(
                  array(
                    'taxonomy' => 'company_state',
                    'field'    => 'slug',
                    'terms'    => array(),
                  ),
                ),
              );
              if( $cptState ) {
                foreach( $cptState as $term ) {
                  $args['tax_query'][0]['terms'][] = $term->slug;
                }
              }
            } else {
              $today = date ('Y-m-d H:i:s');

              $args = array (
                'post_type' => 'evenement',
                'post_status' => 'publish',
                
                'tax_query' => array (
                  array(
                    'taxonomy' => 'type_news',
                    'field'    => 'slug',
                    'terms'    => array(),
                  ),
                ),
                'meta_query' => array (
                  'relation' => 'OR',
                  'event' => array (
                    'key' => 'date_event',
                    'value' => $today,
                    'compare' => '>=',
                    'type' => 'DATETIME'
                  ),
                  'actu' => array (
                    'key' 		=> 'type_event',
                    'value' 	=> 'evenement',
                    'compare' => 'NOT IN',
                  ),
                ),
              
                'posts_per_page' => 6,
                'orderby' => array ( 
                  'date' => 'DESC' 
                )
              );
              if( $cptType ) {
                foreach( $cptType as $term ) {
                  $args['tax_query'][0]['terms'][] = $term->slug;
                }
              }
            }
            
            

            query_posts( $args );

            if(have_posts()) : ?>

            <div class="pt-6 pb-8">
              <div class="carouselCards col-md-10 offset-md-2" data-flickity="{ &quot;cellAlign&quot;: &quot;left&quot;, &quot;contain&quot;: true, &quot;pageDots&quot;: false, &quot;arrowShape&quot;: &quot;M4.505 51.43l10.108 10.257L13.319 63 1 50.5 13.319 38l1.294 1.313L4.505 49.57H99v1.86H4.505zm-.876-.889l-.041-.041.041-.042v.084z&quot; }">
              
              <?php while(have_posts()) : the_post(); 
                get_template_part('template-parts/card', 'card');

              endwhile; ?>
              </div>
            </div>
            <?php endif;

            wp_reset_query();
          ?>
          <?php if ( $link && $btn ) : ?>
          <div class="d-flex justify-content-center">
            <a class="btn <?php if($color) { echo '-dark'; } else { echo '-light'; }; ?>" href="<?php echo $link; ?>"><?php echo $btn ?></a>
          </div>
          <?php endif; ?>
        </div>
      </section>

    <?php elseif( get_row_layout() == 'sec_imgbg' ): 
      $title     = get_sub_field('sec_imgbg_title');
      $intro     = get_sub_field('sec_imgbg_intro');
      $link      = get_sub_field('sec_imgbg_link');
      $image     = get_sub_field('sec_imgbg_img');
    ?>

      <section class="scImgbg py-8 bg-gray-900 text-intro position-relative d-flex align-items-center">
        <div class="imgContainerFull">
          <?php echo wp_get_attachment_image( $image, 'full' ); ?>
        </div>
        <div class="container text-white">
          <div class="row">
            <div class="col-md-7">
              <h2><?php echo $title; ?></h2>
              <p><?php echo $intro; ?></p>
              <?php if ( $link ) :?>
                <a class="btn -solid" href="<?php echo $link; ?>">En savoir plus</a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </section>

    <?php elseif( get_row_layout() == 'sec_carou' ): ?>

      <?php if( have_rows('sec_carou_slides') ): $i = 1; ?>
        <div class="container-fluid">
          <section class="scCarousel pb-sm-8 pb-2">
            <?php while( have_rows('sec_carou_slides') ): the_row(); 
              $title   = get_sub_field('sec_carou_slides_title');
              $chapo   = get_sub_field('sec_carou_slides_chapo');
              $intro   = get_sub_field('sec_carou_slides_intro');
              $image   = get_sub_field('sec_carou_slides_img');
              $link    = get_sub_field('sec_carou_slides_link');
              $btn     = get_sub_field('sec_carou_slides_btn');
              $file    = get_sub_field('sec_carou_slides_file');
              $btnfile = get_sub_field('sec_carou_slides_btnfile');
              ?>
              <article id="slide<?php echo $i; ?>" class="row align-items-center pb-9 bg-white scCarousel__item">
                <div class="col-lg-7">
                  <h2><?php echo $title; ?></h2>
                  <?php if( $chapo ) : ?>
                    <p class="text-intro"><?php echo $chapo; ?></p>
                  <?php endif; ?>
                  <?php echo $intro; ?>
                  <?php if ( $link || $file ) : ?>
                    <div class="pt-3 d-flex">
                      <?php if ( $link && $btn ) : ?>
                        <a class="btn -secondary mr-3" href="<?php echo $link; ?>"><?php echo $btn; ?></a>
                      <?php endif; ?>
                      <?php if ( $file && $btnfile ) : ?>
                        <a class="btn -dark" href="<?php echo $file; ?>">
                          <i class="icon-icon_Download" aria-hidden="true"></i>
                          <?php echo $btnfile; ?>
                        </a>
                      <?php endif; ?>
                    </div>
                  <?php endif; ?>
                </div>
                <div class="col-lg-5">
                  <div class="mx-8 mx-lg-4 mx-xl-6">
                    <?php echo wp_get_attachment_image( $image, 'full', "", ["class" => "style-svg"] ); ?>
                  </div>
                </div>
              </article>
            <?php endwhile; ?>
            <nav class="scCarousel__nav">
              <ul class="list-unstyled">
              <?php while( have_rows('sec_carou_slides') ): the_row(); 
                $title   = get_sub_field('sec_carou_slides_title');
                ?>
                <li class="scCarousel__navItem">
                  <a href="#slide<?php echo $i; ?>" class="scCarousel__navLink" data-name="Slide <?php echo $i; ?>">
                    <span class="scCarousel__navDot"></span>
                  </a>
                </li>
              <?php $i++; endwhile; ?>
              </ul>
            </nav>
          </section>
        </div>
        
      <?php endif; ?>

    <?php elseif( get_row_layout() == 'sec_list' ): 
      $title   = get_sub_field('sec_list_title');
      $chapo   = get_sub_field('sec_list_chapo');
      $image   = get_sub_field('sec_list_img');
    ?>
    <section class="scList py-sm-8 py-2 bg-secondary text-white">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-4 mb-4 mb-lg-0">
            <h2><?php echo $title; ?></h2>
            <p class="text-intro"><?php echo $chapo; ?></p>
            <?php if ( $image ) : ?>
              <div class="p-6 d-none d-lg-block"><?php echo wp_get_attachment_image( $image, 'full' ); ?></div>
            <?php endif; ?>
          </div>
          <div class="col-lg-8">
            <?php if( have_rows('sec_list_repeat') ): ?>
              <div class="row">
                <?php while( have_rows('sec_list_repeat') ): the_row(); 
                  $title = get_sub_field('sec_list_repeat_title');
                  $text  = get_sub_field('sec_list_repeat_text');
                  $icon  = get_sub_field('sec_list_repeat_icon');
                ?>
                <div class="col-sm-6">
                  <div class="row mb-6">
                    <div class="col-3">
                      <?php echo wp_get_attachment_image( $icon, 'full', "", ["class" => "style-svg svg-white"] ); ?>
                    </div>
                    <div class="col-9">
                      <h4 class="h4 mt-0"><?php echo $title; ?></h4>
                      <?php echo $text; ?>
                    </div>
                  </div>
                </div>
                <?php endwhile; ?>
              </div>
            <?php endif; ?>
          </div>
        </div>
      
      </div>
    </section>
    <?php endif; ?>
  <?php endwhile; ?>
<?php endif; ?>