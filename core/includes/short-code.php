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
    'post_type' => 'post',
    'post_status' => 'publish',
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
