<?php 
/*
Template Name: Concours Rubika
*/
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

  <?php wp_head(); ?>
  <style>
    #gform_fields_4,
    #gform_fields_4 .ginput_container_address {
      display: flex;
      flex-wrap: wrap;
      column-gap: 24px;
    }
    #gform_fields_4 .gfield--width-full,
    #gform_fields_4 .gfield--width-half,
    #gform_fields_4 .ginput_left,
    #gform_fields_4 .ginput_right,
    #gform_fields_4 .field_sublabel_hidden_label,
    #gform_fields_4 .address_line_1 {
      flex-basis: 100%;
    }
    @media screen and (min-width: 600px) {
      #gform_fields_4 .gfield--width-half,
      #gform_fields_4 .ginput_left,
      #gform_fields_4 .ginput_right {
        flex-basis: calc(50% - 12px);
        padding: 0;
      }
    }
    #gform_fields_4 .gfield_html ul {
      padding-left: 30px;
      list-style: disc;
    }
    .hidden-field-label > .gfield_label {
      display: none;
    }
  </style>
</head>

<body <?php body_class(); ?>>
  <img src="https://numericabfc.com/wp-content/uploads/2022/02/visuel-rubika-scaled.jpg" alt="Bandeau Rubika">
  <main>
    <div class="container-fluid">
      <div class="row my-8">
        <div class="col-lg-8 offset-lg-2">
          <h1>Inscription concours mastère</h1>
          <p>Les informations demandées dans les champs marqués d'un astérisque (*) sont nécessaires pour établir votre dossier d'inscription. Merci de les compléter avec attention.</p>
          <?php
            if ( have_posts() ) :
              while ( have_posts() ) :
                the_post();

                the_content();

                gravity_form( 4, false, false, false, '', false );

              endwhile;
            endif;
          ?>
        </div>
      </div>
    </div>
  </main>
<?php 
    wp_footer(); 
  ?>
</body>
</html>