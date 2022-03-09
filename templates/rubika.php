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
    #gform_fields_4 .ginput_container_address,
    .clear-multi {
      display: flex;
      flex-wrap: wrap;
      column-gap: 24px;
    }
    .ginput_container_date {
      flex: 1;
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

  <!-- Facebook Pixel Code Numerica -->
  <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '323602496364373');
    fbq('track', 'PageView');

    window.onload = function(e) {
        
    function editForm() {
      fbq('trackCustom', 'startcompletion');
    }

    function sendForm() {
      fbq('track', 'CompleteRegistration');
    }

    document.querySelector("#input_4_10_2").addEventListener("focus", editForm );
    document.querySelector("#input_4_10_3").addEventListener("keypress", editForm );
    document.querySelector("#input_4_10_6").addEventListener("keypress", editForm );
    document.querySelector("#input_4_12").addEventListener("keypress", editForm );
    document.querySelector("#input_4_11").addEventListener("keypress", editForm );
    document.querySelector("#gform_submit_button_4").addEventListener("click", sendForm );

  };

      
  </script>

  <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=323602496364373&ev=PageView&noscript=1"/>
  </noscript>

<!-- End Facebook Pixel Code Numerica -->
</head>

<body <?php body_class(); ?>>
  <img src="https://numericabfc.com/wp-content/uploads/2022/02/visuel-rubika-scaled.jpg" alt="Bandeau Rubika">
  <main>
    <div class="container-fluid">
      <div class="row my-8">
        <div class="col-lg-8 offset-lg-2">
          <?php
            if ( have_posts() ) :
              while ( have_posts() ) :
                the_post();

                the_title('<h1>', '</h1>');

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