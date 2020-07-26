<?php
add_action('init', 'renderCountPostCatShortcode');
  // add_filter( 'widget_text', 'renderListPost');
add_filter( 'widget_text', 'do_shortcode');
/* Shortcode*/
function renderCountPostCatShortcode (){
  add_shortcode('count_post_category','renderListPost');
}
function renderListPost() {
  $cats = get_terms('category');
  ob_start();
   foreach($cats as $cat){
    $category_link = get_term_link( $cat );
    if($cat->name !== 'Uncategorized'){
      echo '<li class="category-item"><span><a class="roboto category-name" href="'.$category_link.'">'.$cat->name.'</a></span> <span clas="cat-counts-post">'.$cat->count.'<span> </li>';
    }
  }
  $output=ob_get_contents();
  ob_end_clean();
  return $output;
}

//Popular shortcode
add_action('init', 'renderPopularPostShortcode');
function renderPopularPostShortcode (){
  add_shortcode('popular_post','renderPopularPost');
}
function renderPopularPost(){
  $args = array(
    'posts_per_page' => 3,
    'meta_key' => 'post_views_count',
    'orderby' => 'meta_value_num',
    'order' => 'DESC',
    'post_type' => 'post',
    'post_status' => 'publish',
  );
  $popular_post_query = new WP_Query($args);
  ob_start();
  ?>
  <div class="popular__post">
    <div class="popular__post-container">
  <?php
  while ($popular_post_query->have_posts()):$popular_post_query->the_post();
  $views = getPostViews(get_the_id());
    ?>
    <div class="popupar__post-item">
      <div class="nw__post-item row-divide">
        <div class="nw__image col-divide-4">
          <a href="<?php echo get_permalink(); ?>"><img src="<?php echo hk_get_thumb(get_the_id(),485,360) ?>" alt="Image"></a>
        </div>
        <div class="nw__infomation col-divide-8">
          <div class="nw__post-title nw__post-title--small">
            <a href="<?php echo get_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 10, '...' );?></a>
          </div>
          <div class="nw__editor-date open-sanrif">
            <span class="date-time open-sanrif"><?php echo get_the_date( 'F j, Y' ) ?></span>
          </div>
        </div>
      </div>
    </div>
    <?php
  endwhile;
  ?></div>
</div>
  <?php
  $output=ob_get_contents();
  ob_end_clean();
  return $output;
}

add_action('init', 'renderSinglePopularPostShortCode');
function renderSinglePopularPostShortCode(){
  add_shortcode('single_popular_post','renderSinglePopularPost');
}
function renderSinglePopularPost(){
  $args = array(
    'posts_per_page' => 9,
    'meta_key' => 'post_views_count',
    'orderby' => 'meta_value_num',
    'order' => 'DESC',
    'post_type' => 'post',
    'post_status' => 'publish',
  );
  $popular_post_query = new WP_Query($args);
  ob_start();
  ?>
  <div class="popular__post-single">
    <div class="popular__post-single-container">
  <?php
  while ($popular_post_query->have_posts()):$popular_post_query->the_post();
  $views = getPostViews(get_the_id());
    ?>
    <div class="popupar__post-single-item">
      <div class="nw__post-item row-divide">
        <div class="nw__image col-divide-4">
          <a href="<?php echo get_permalink(); ?>"><img src="<?php echo hk_get_thumb(get_the_id(),485,360) ?>" alt="Image"></a>
        </div>
        <div class="nw__infomation col-divide-8">
          <div class="nw__post-title nw__post-title--small">
            <a href="<?php echo get_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 10, '...' );?></a>
          </div>
          <div class="nw__editor-date open-sanrif">
            <span class="date-time open-sanrif"><?php echo get_the_date( 'F j, Y' ) ?></span>
          </div>
        </div>
      </div>
    </div>
    <?php
  endwhile;
  ?></div>
  <button id="load-more-post">Load More</button>
  <button id="close-post">Close</button>
      </div><?php
  $output=ob_get_contents();
  ob_end_clean();
  return $output;
}
//House Produce shortcode
add_action('init', 'renderHousePostShortcode');
function renderHousePostShortcode (){
  add_shortcode('house_post','renderHousePost');
}
function renderHousePost($name_slug){
  $args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'category_name' => $name_slug['cat']
  );
  $popular_post_query = new WP_Query($args);
  ob_start();
  $i=0;
  while ($popular_post_query->have_posts()):$popular_post_query->the_post();
  $views = getPostViews(get_the_id());
  if($i<=2 && $views >= 0){
    ?>
    <div class="nw__post-item row-divide">
      <div class="nw__image col-divide-4">
        <a href="<?php echo get_permalink(); ?>"><img src="<?php echo hk_get_thumb(get_the_id(),485,360) ?>" alt="Image"></a>
      </div>
      <div class="nw__infomation col-divide-8">
        <div class="nw__post-title nw__post-title--small">
          <a href="<?php echo get_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 10, '...' );?></a>
        </div>
        <div class="nw__editor-date open-sanrif">
          <span class="date-time open-sanrif"><?php echo get_the_date( 'F j, Y' ) ?></span>
        </div>
      </div>
    </div>
    <?php
    $i++;
  }
  endwhile;
  $output=ob_get_contents();
  ob_end_clean();
  return $output;
}

add_action('init', 'renderAuthorShortcode');
function renderAuthorShortCode(){
  add_shortcode('author','renderAuthorInfo');
}
function renderAuthorInfo(){
  ob_start();
  ?>
  <div class="author text--dark">
    <?php echo get_avatar(get_the_author_meta( 'ID' )); ?>
    <div class="author-name text--upcase open-sanrif">
      <?php the_author(); ?>
    </div>
    <div class="author-description">
      <?php echo get_the_author_meta('description') ?>
    </div>
  </div>
  <?php
  $output=ob_get_contents();
  ob_end_clean();
  return $output;
}
add_action('init','renderNewMusicShorCode');
function renderNewMusicShorCode(){
  add_shortcode( 'new_music', 'renderNewMusic');
}
function renderNewMusic(){
  $args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'order'=>'desc',
    'category_name' => 'music',
    'posts_per_page' => 4,
  );
  $query_music = new WP_Query($args);
  ob_start();
  ?>
  <div class="new__music-container">
  <?php
  while($query_music -> have_posts()):$query_music->the_post();
  ?>
  <div class="music__new-item row-divide">
    <div class="music__new-thumb col-divide-4">
      <a rel="nofollow" target="_blank" href="<? the_permalink()?>">
        <img src="<?php echo hk_get_thumb(get_the_id(),75,75) ?>" alt="Image">
      </a>
      <div class="icon-music">
          <i class="fas fa-music"></i>
      </div>
    </div>
    <div class="music__new-title col-divide-8">
      <a rel="nofollow" target="_blank" href="<? the_permalink()?>"><?php the_title(); ?></a>
      <div class="date-post">
        <span class="date-time open-sanrif"><?php echo get_the_date( 'F j, Y' ) ?></span>
      </div>
    </div>
  </div>
  <?php
  endwhile;
  ?>
  </div>
  <?php
  $output=ob_get_contents();
  ob_end_clean();
  return $output;
}
add_action('init','renderSliderPostShortCode');
function renderSliderPostShortCode(){
  add_shortcode('slider_post','renderSliderPost');
}
function renderSliderPost($name_slug){

  $args = array(
    'category_name' => $name_slug['cat'],
    'order' => 'DESC',
    'showposts' => '6',
    'post_type' => 'post',
    'post_status' => 'publish',
  );
  $category_post = new WP_Query($args);
  ob_start();

  ?>
  <div class="slidePost" data-flickity='{ "autoPlay": true, "pauseAutoPlayOnHover": false, "pageDots": false,"draggable": true}'>
  <?php
  while($category_post->have_posts()):$category_post->the_post();
  ?>
    <div class="slidePost__item">
      <div class="slidePost__item-title">
        <h2 class="title__block"> <a href="<?php the_permalink() ?>"><?php echo wp_trim_words(get_the_title(),15,'...'); ?></a> </h2>
      </div>
      <div class="slidePost__item-author slidePost__item-date slidePost__item-views">
        <div class="author date">
          <span class="author-name"><?php the_author_link(); ?></span>
          -
          <span class="date-time"><?php echo get_the_date( 'F j, Y' ); ?></span>
          <span class="views-count"><?php echo getPostViews(get_the_id()); ?></span>
        </div>
      </div>
      <div class="slidePost__item-thumbnail">
        <div class="thumbnail-image">
          <a href="<?php the_permalink() ?>"> <img src="<?php echo hk_get_thumb(get_the_id(),324,162) ?>" alt="image"> </a>
          <div class="category-post">
            <?php
            $categories=get_the_category(get_the_id());
            $i=0;
              foreach ($categories as $c) {
                $category_link = get_category_link($c->cat_ID);
                if($i===0){
                  echo '<span class="category-title"><a href="'.$category_link.'">'.$c->cat_name.'</a></span>';}
                  $i++;
              } ?>
          </div>
        </div>
      </div>
      <div class="slidePost__item-excerpt open-sanrif">
        <?php echo wp_trim_words( get_the_content(), 20, '...' ); ?>
      </div>
    </div>
  <?php
  endwhile;
  ?>
  </div>
  <?php
  $output=ob_get_contents();
  ob_end_clean();
  return $output;
}
