<html>
<head>
  <title>Rico De Santis Web Developer</title>
  <?php wp_head()?>
  <meta name="viewport" content="width=device-width" />
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Alegreya|Amiri|Arvo|Crete+Round|Martel|Merriweather+Sans|Neuton|Noto+Serif+SC|Noto+Serif+TC|Rokkitt|Tinos" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- <link rel="stylesheet" href="animate.css"/> -->
</head>
<body class="<?php echo get_the_title(); ?>">
  <header>
    <section class="hero-section">

      <?php $thumbnail_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
      <img class='hero-image' src="<?php echo $thumbnail_url ?>" >
      
      <div class="hero-screen"></div>
            <nav>
        <article class="nav-container mobile-nav-container">
          <!-- <div class="nav-click-to-call"><a href="tel:+15613153658">561.315.3658</a></div> -->
          <div class="nav-wrapper">

            <div class="nav-logo">
              <a href="http://localhost/bad_bread/"><img src="http://bad-bread.ricodesantis.com/wp-content/uploads/2019/09/bb_logo-ko.png" alt="Bad Bread Logo" class="menu-logo"></a>
             </div> 
            <?php
              $defaults = array(
                'container' => 'div',
                'menu' => 'Main',
                'container_class' => 'desktop-nav'
              );
              wp_nav_menu($defaults);
            ?>
            <div class='mobile-nav'>
              <!-- <div id="mobile-menu-hide"><span>&times;</span></div> -->
            <?php
              $defaults = array(
                // 'container' => 'div',
                'menu' => 'Main',
                'container_class' => 'mobile-nav'
              );
              wp_nav_menu($defaults);
            ?>
            </div>
            <button value="mobile-menu-icon" name="mobile-menu-icon" type="mobile-menu-icon" class="mobile-menu-button" tabindex="-1">
              <div id="menu-line-1" class="mobile-menu-line"></div>
              <div id="menu-line-2" class="mobile-menu-line"></div>
              <div id="menu-line-3" class="mobile-menu-line"></div>
            </button>
            
            
          </div>
        </article>
      </nav>
    </section>
  </header>