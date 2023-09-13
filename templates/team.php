<?php 
/*
Template Name: Équipe
*/
?>

<?php 
  get_header();
  get_template_part( 'template-parts/hero', 'hero' );
  ?>
  <div class="container-fluid">
    <div class="my-8">
      <?php if ( have_posts() ) :
        while ( have_posts() ) :
          the_post();

          the_content();

        endwhile;
      endif;
      
      
      
      $args = array(  
        'role__in'      => [ 'subscriber' ],
        'meta_key'		  => 'user_sort',
        'orderby'       => 'meta_value',
        'order'         => 'ASC'
      );
      $users = get_users($args);
      // print_r($users);

      if ( $users ) : ?>
        <ul class="list-unstyled mt-8 row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4">
          <?php foreach($users as $user) :
            $function = get_field('user_fonction', 'user_' . $user->ID );
            $tel      = get_field('user_tel', 'user_' . $user->ID );
            $photo    = get_field('user_photo', 'user_' . $user->ID );
            $team     = get_field('user_equipe', 'user_' . $user->ID );
            $usersort = get_field('user_sort', 'user_' . $user->ID );
            // print_r($usersort);
          
          ?>
            <?php if ( $team ) : ?>
              <li class="col mb-8 text-break">
                <?php echo wp_get_attachment_image( $photo, 'team' ); ?>
                <h5><?php echo $user->first_name ?> <span class="uppercase"><?php echo $user->last_name ?></span></h5>
                <p class="my-0 fw-600 mb-3"><?php echo $function ?></p>
                <p class="my-0 mb-2">
                  <a href="mailto:<?php echo $user->user_email ?>"><?php echo $user->user_email ?></a>
                </p>
                <p class="my-0 mb-2">
                  <a href="tel:<?php echo $tel ?>"><?php echo $tel ?></a>
                </p>
              </li>
            <?php endif; ?>
            
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
    </div>
  </div>
  <?php
  get_template_part( 'template-parts/pre-footer', 'pre footer' );

  get_footer();
?>