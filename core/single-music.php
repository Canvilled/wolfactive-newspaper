<?php
get_header();
get_template_part('sections/breadcum');
setPostViews(get_the_id());
?>
<section class="wrapper" id="singlePost">
  <div class="single__music-post">
    <?php
    $categories = get_the_category();
    foreach ($categories as $cat) {
      if($cat->name === "Music"){
        $id=$cat->cat_ID;
        $cat_name=$cat->name;
        $category= get_category($id);
        $category_link = get_category_link($id);
        $image = get_field('banner_category',$category);
        $color = get_field('color_category',$category);
        ?>
        <div class="banner-music position--relative">
          <img src="<?php echo $image ?>" alt="banner__image">
          <div class="cat-tit-music">
            <div class="category-name text--center">
              <?php echo '<a href="'.$category_link.'" style="background:'.$color.'">'.$cat->name.'</a></li>'; ?>
            </div>
            <div class="title-music text--center">
              <?php the_title(); ?>
            </div>
            <div class="author-date row-divide">
              <div class="author row-divide">
                <?php echo get_avatar(get_the_author_meta( 'ID' )); ?>
                <div class="author-name open-sanrif"><span> By </span><?php the_author_link() ?></div>
              </div>
              <div class="date open-sanrif"><?php echo get_the_date(); ?></div>
              <div class="views-count">
                <?php echo getPostViews(get_the_id()) ?> Views
              </div>
            </div>
          </div>
        </div>
        <div class="single__music-wrapper">
          <div class="music__wrapper">
            <div class="music py-40">
              <div class="music-content container">
                <?php the_content(); ?>
              </div>
            </div>
          </div>
          <?php get_template_part( 'sections/related-music' );?>
          <div class="social-des-container container row-divide">
            <div class="ad-social col-divide-8">
              <?php get_template_part( 'sections/social-share' ); ?>
              <div class="description-music">
                <?php the_field('description'); ?>
              </div>
              <div class="author">
                <div class="author-container row-divide my-20">
                  <div class="author-image col-divide-3">
                    <img src="<?php echo get_avatar_url(get_the_author_meta( 'ID' )); ?>" alt="">
                  </div>
                  <div class="author-des col-divide-9">
                    <div class="author-name open-sanrif">
                      <a href="<?php get_the_author_link(); ?>"><?php the_author(); ?></a>
                    </div>
                    <div class="author-description">
                      <?php echo get_the_author_meta('description') ?>
                      <ul class="share-buttons myt-20" data-source="simplesharingbuttons.com">
                        <li><a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.facebook.com%2FWolfactiveweb.design.SEO%2F&quote=T%C6%B0%20v%C3%A2%CC%81n%20v%C3%A0%20thi%E1%BA%BFt%20k%E1%BA%BF%20web%20chu%E1%BA%A9n%20SEO%20-%20Wolfactive" title="Share on Facebook" target="_blank"><img alt="Share on Facebook" src="<?php echo THEME_URL.'/images' ?>/simple_icons_black/Facebook.png" /></a></li>
                        <li><a href="https://twitter.com/intent/tweet?source=https%3A%2F%2Fwww.facebook.com%2FWolfactiveweb.design.SEO%2F&text=T%C6%B0%20v%C3%A2%CC%81n%20v%C3%A0%20thi%E1%BA%BFt%20k%E1%BA%BF%20web%20chu%E1%BA%A9n%20SEO%20-%20Wolfactive:%20https%3A%2F%2Fwww.facebook.com%2FWolfactiveweb.design.SEO%2F" target="_blank" title="Tweet"><img alt="Tweet" src="<?php echo THEME_URL.'/images' ?>/simple_icons_black/Twitter.png" /></a></li>
                        <li><a href="https://plus.google.com/share?url=https%3A%2F%2Fwww.facebook.com%2FWolfactiveweb.design.SEO%2F" target="_blank" title="Share on Google+"><img alt="Share on Google+" src="<?php echo THEME_URL.'/images' ?>/simple_icons_black/Google+.png" /></a></li>
                        <li><a href="http://pinterest.com/pin/create/button/?url=https%3A%2F%2Fwww.facebook.com%2FWolfactiveweb.design.SEO%2F&description=T%C6%B0%20v%C3%A2%CC%81n%20v%C3%A0%20thi%E1%BA%BFt%20k%E1%BA%BF%20web%20chu%E1%BA%A9n%20SEO%20-%20Wolfactive%2C%20Th%C3%A0nh%20ph%E1%BB%91%20H%E1%BB%93%20Ch%C3%AD%20Minh.%201%2C562%20likes%20%C2%B7%202%20talking%20about%20this.%20Ch%C3%BAng%20t%C3%B4i%20cung%20c%E1%BA%A5p%20d%E1%BB%8Bch%20v%E1%BB%A5%20thi%E1%BA%BFt%20k%E1%BA%BF%20web%20theo%20y%C3%AAu%20c%E1%BA%A7u%20v%E1%BB%9Bi%20m%E1%BB%A9c%20ph%C3%AD%20chi%20tr%E1%BA%A3%20v%E1%BB%ABa%20ph%E1%BA%A3i.%20Ch%C3%BAng%20t%C3%B4i..." target="_blank" title="Pin it"><img alt="Pin it" src="<?php echo THEME_URL.'/images' ?>/simple_icons_black/Pinterest.png" /></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="music-sidebar col-divide-4">
              <?php if (dynamic_sidebar('single-music-sidebar')) : get_sidebar( 'single-music-sidebar' ); ?><?php endif; ?>
            </div>
          </div>
        </div>
        <?php
      }
    }
     ?>
  </div>
</section>
<?php
get_footer();
?>
