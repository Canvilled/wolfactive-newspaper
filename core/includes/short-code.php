<?php
add_action('init', 'renderListPostShortcode');
  // add_filter( 'widget_text', 'renderListPost');
add_filter( 'widget_text', 'do_shortcode');
/* Shortcode*/
function renderListPostShortcode (){
  add_shortcode('GiveMeListPost','renderListPost');
}
function renderListPost($args) {
  // setup output shortcode
  $query = array(
    'post_type' => 'post',
    'showposts' => 4,
    'post_status' => 'publish',
    'category_name' => $args['cat']
  );
  $postList= new WP_Query($query);
  $output = '';
  while($postList->have_posts()):$postList->the_post();

    $output .= '
    <div class="'.$args['class'].'">Đạt is Here</div>
    ';
  endwhile;
  return $output;
}
