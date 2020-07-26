<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
     <meta charset="<?php bloginfo('charset'); ?>" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     <meta name="author" content="Wolfactive - HuyNguyen - PhuongNam - TanDat">
  	 <link rel="profile" href="https://wolfactive.net/">
     <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
     <link rel="preload" href="<?php echo get_theme_file_uri('assets\css\lib\fontawsome\webfonts\fa-brands-400.woff2') ?>" as="font" type="font/woff2" crossorigin>
     <link rel="preload" href="<?php echo get_theme_file_uri('assets\css\lib\fontawsome\webfonts\fa-regular-400.woff2') ?>" as="font" type="font/woff2" crossorigin>
     <link rel="preload" href="<?php echo get_theme_file_uri('assets\css\lib\fontawsome\webfonts\fa-solid-900.woff2') ?>" as="font" type="font/woff2" crossorigin>
     <link rel="stylesheet" href="<?php echo get_theme_file_uri('assets/css/globals.min.css') ?>">
     <script defer type='text/javascript' src="<?php echo get_theme_file_uri('assets/js/main.min.js') ?>"></script>
     <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<section class="header">
  <?php if(!wp_is_mobile()){ ?>
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
    <div class="menu__container">
      <div class="menu__wrapper container row-divide">
        <div class="menu__background col-divide-6">
          <?php
           wp_nav_menu(array(
          'theme_location' => 'headerMenuLocation' ));
          ?>
        </div>
        <div class="header__item search__content col-divide-6">
          <button type="button" name="button" class="open-search" onclick="openSearch()"><i class="fas fa-search" aria-hidden="true"></i></button>
          <div class="search__wrapper" style="display:none;">
              <form role="search" method="get" id="searchForm" class="search-form" action="<?php echo esc_url(site_url('/')); ?>">
                <div class="search__field-container">
                  <label>
                    <input type="text" class="search-field" placeholder="Tìm Kiếm" value="" name="s">
                    <input type="hidden" class="search-field" placeholder="Search …" value="1" name="sentence">
                    <input type="hidden" class="search-field" placeholder="Search …" value="post" name="post_type">
                  </label>
                  <button type="submit" class="search-submit" value="Search" aria-label="Button Submit Search">
                    search >
                  </button>
                </div>
              </form>
            <div class="search__result-overlay my-20" id="searchResult"></div>
          </div>
        </div>
      </div>
     </div>
     <div class="header__item d--none dp--block">
        <button class="btn text--light" id="navBtn" aria-label="btn-navbar">
            <i class="fas fa-bars icon--text"></i>
        </button>
     </div>
  </div>
  <?php }
  else{ ?>
    <div class="main--background" id="headerNavBar">
    <div class="container navbar__mb">
       <?php
      //  wp_nav_menu(array(
      // 'theme_location' => 'headerMenuLocation' ));
      ?>
    </div>
  </div>
  <?php } ?>
</section>
