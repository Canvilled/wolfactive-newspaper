<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="Wolfactive - HuyNguyen - PhuongNam - TanDat">
    <link rel="profile" href="https://wolfactive.net/">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <link rel="preload"
        href="<?php echo get_theme_file_uri('assets\css\lib\fontawsome\webfonts\fa-brands-400.woff2') ?>" as="font"
        type="font/woff2" crossorigin>
    <link rel="preload"
        href="<?php echo get_theme_file_uri('assets\css\lib\fontawsome\webfonts\fa-regular-400.woff2') ?>" as="font"
        type="font/woff2" crossorigin>
    <link rel="preload" href="<?php echo get_theme_file_uri('assets\css\lib\fontawsome\webfonts\fa-solid-900.woff2') ?>"
        as="font" type="font/woff2" crossorigin>
    <link rel="stylesheet" href="<?php echo get_theme_file_uri('assets/css/globals.min.css') ?>">
    <script defer type='text/javascript' src="<?php echo get_theme_file_uri('assets/js/main.min.js') ?>"></script>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <section class="home__wrapper">
        <?php if(wp_is_mobile()){ ?>
        <div class="search__wrapper search__wrapper-mobile d--none">
            <div class="search__wrapper-mobile--close">
            <button class="btn close__navbar-search" id="closeSearchNav" ><i class="fas fa-times"></i></button>
            </div>
            
            <div class="navbar__mb-logo-search search__wrapper-mobile--logo">
                <?php
               $image = get_field('logo','option');
                  ?>
                <img src="<?php echo $image; ?>" alt="logo-newspaper-wolfactive">
            </div>
            <form role="search" method="get" id="searchForm" class="search-form"
                action="<?php echo esc_url(site_url('/')); ?>">
                <div class="search__field-container">
                    <label>
                        <input type="text" class="search-field" placeholder="Tìm Kiếm" value="" name="s">
                        <input type="hidden" class="search-field" placeholder="Search …" value="1" name="sentence">
                        <input type="hidden" class="search-field" placeholder="Search …" value="post" name="post_type">
                    </label>
                </div>
                <div class="btn-search-nav">
                    <button type="submit" class="btn search-submit" value="Search" aria-label="Button Submit Search">
                        <i class="fas fa-search" aria-hidden="true"></i>
                    </button>
                </div>
            </form>
            <div class="search__result-overlay" id="searchResult"></div>
        </div>
        <div class="navbar__mb d--none">
            <button class="btn close__navbar"><i class="fas fa-times"></i></button>
            <div class="bg-cover-image"></div>
            <div class="navbar__mb-container">
                <div class="navbar__mb-logo">
                    <?php
               $image = get_field('logo_footer','option');
                  ?>
                    <img src="<?php echo $image; ?>" alt="logo-newspaper-wolfactive">
                </div>
                <?php
       wp_nav_menu(array(
      'theme_location' => 'headerMenuLocation' ));
      ?>
            </div>
        </div>
        <?php } ?>
        <div class="search-focus-click d--none"></div>
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
                                <img src="<?php echo hk_get_image($banner_image,700,150) ?>"
                                    alt="banner-image-newspaper-wolfactive">
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
                            <button type="button" name="button" class="open-search"><i class="fas fa-search"
                                    aria-hidden="true"></i></button>
                            <div class="search__wrapper d--none">
                                <form role="search" method="get" id="searchForm" class="search-form"
                                    action="<?php echo esc_url(site_url('/')); ?>">
                                    <div class="search__field-container">
                                        <label>
                                            <input type="text" class="search-field" placeholder="Tìm Kiếm" value=""
                                                name="s">
                                            <input type="hidden" class="search-field" placeholder="Search …" value="1"
                                                name="sentence">
                                            <input type="hidden" class="search-field" placeholder="Search …"
                                                value="post" name="post_type">
                                        </label>
                                        <button type="submit" class="btn search-submit" value="Search"
                                            aria-label="Button Submit Search">
                                            Tìm Kiếm
                                        </button>
                                    </div>
                                </form>
                                <div class="search__result-overlay" id="searchResult"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php }
  else{ ?>
            <div class="main--background" id="headerNavBar">
                <div class="nav__header">
                    <div class="btn__open-menu">
                        <button class="btn text--light btn-nav" id="navBtn" aria-label="btn-navbar">
                            <i class="fas fa-bars icon--text"></i>
                        </button>
                    </div>
                    <div class="nav__header-logo">
                        <a href="<?php echo site_url(); ?>" class="d--block header-logo mr-auto">
                            <?php
              $image = get_field('logo_footer','option');
                 ?>
                            <img src="<?php echo $image; ?>" alt="logo-newspaper-wolfactive">
                        </a>
                    </div>
                    <div class="search-nav">
                        <button type="button" name="button" class="open-search open-search-nav"><i class="fas fa-search"
                                aria-hidden="true"></i></button>

                    </div>
                </div>
            </div>
            <?php } ?>
        </section>