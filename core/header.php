<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
     <meta charset="<?php bloginfo('charset'); ?>" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     <meta name="author" content="Wolfactive - HuyNguyen - PhuongNam">
  	 <link rel="profile" href="https://wolfactive.net/">
     <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
     <link rel="preload" href="<?php echo get_theme_file_uri('assets\css\lib\fontawsome\webfonts\fa-brands-400.woff2') ?>" as="font" type="font/woff2" crossorigin>
     <link rel="preload" href="<?php echo get_theme_file_uri('assets\css\lib\fontawsome\webfonts\fa-regular-400.woff2') ?>" as="font" type="font/woff2" crossorigin>
     <link rel="preload" href="<?php echo get_theme_file_uri('assets\css\lib\fontawsome\webfonts\fa-solid-900.woff2') ?>" as="font" type="font/woff2" crossorigin>
     <link rel="stylesheet" href="<?php echo get_theme_file_uri('assets/css/globals.min.css') ?>">
     <script type='text/javascript' src="<?php echo get_theme_file_uri('assets/js/main.min.js') ?>"></script>
     <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<section class="header">
  <div class="main--background">
    <div class="header__contain">
      <div class="logo-and-banner row-divide container">
        <div class="header__item logo__container col-divide-4">
           <a href="<?php echo site_url(); ?>" class="d--block header-logo mr-auto">
             <?php
              $image = get_field('logo','option');
                 ?>
             <img src="<?php echo $image; ?>" alt="logo-newspaper-wolfactive">
           </a>
        </div>
        <div class="header__item banner__container col-divide-8">
          <a href="#" class="header-banner">
            <?php
              $banner_image= get_field('banner','option');
             ?>
             <img src="<?php echo $banner_image ?>" alt="banner-image-newspaper-wolfactive">
          </a>
        </div>
      </div>
  	</div>
    <div class="menu__container dp--none">
      <div class="menu__wrapper container row-divide">
        <div class="menu__background">
          <?php
           wp_nav_menu(array(
          'theme_location' => 'headerMenuLocation' ));
          ?>
        </div>
        <div class="header__item search-content">
          <button type="button" name="button" class="open-search"><i class="fas fa-search"></i></button>
          <form role="search" method="get" class="search-form" action="<?php echo esc_url(site_url('/')); ?>">
            <label>
              <!-- <span class="screen-reader-text">Search for:</span> -->
              <input type="text" class="search-field" placeholder="Tìm Kiếm" value="" name="s">
              <input type="hidden" class="search-field" placeholder="Search …" value="1" name="sentence">
              <input type="hidden" class="search-field" placeholder="Search …" value="post" name="post_type">
            </label>
            <button type="submit" class="search-submit" value="Search" aria-label="Button Submit Search">
              SEARCH >
            </button>
          </form>
        </div>
      </div>
     </div>
     <div class="header__item d--none dp--block">
        <button class="btn text--light" id="navBtn" aria-label="btn-navbar">
            <i class="fas fa-bars icon--text"></i>
        </button>
     </div>
  </div>
    <div class="main--background" id="headerNavBar">

     <div class="container navbar__mb">
       <?php
      //  wp_nav_menu(array(
      // 'theme_location' => 'headerMenuLocation' ));
      ?>
    </div>
  </div>
</section>
