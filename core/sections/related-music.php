<?php
  $orig_post = $post;
  global $post;
  $tags = wp_get_post_tags(get_the_id());
  if ($tags) {
    ?>
    <div class="music__related myt-20">
      <h3>RELATED</h3>
      <div class="music__related-contain" data-flickity='{ "autoPlay": false, "pauseAutoPlayOnHover": false, "pageDots": false,"draggable": true }'>
    <?php
  $tag_ids = array();
  foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
  $args=array(
  'tag__in' => $tag_ids,
  'post__not_in' => array(get_the_id()),
  'showposts'=>12,
  'order'=>'DESC',
  'ign_sticky_posts'=>1
  );

  $my_query = new wp_query( $args );

  while( $my_query->have_posts() ) {
  $my_query->the_post();
  ?>
  <div class="music__related-item">
    <div class="music__related-thumb">
      <a rel="nofollow" target="_blank" href="<? the_permalink()?>">
        <img src="<?php echo hk_get_thumb(get_the_id(),220,130) ?>" alt="Image">
      </a>
      <div class="music-category">
        <?php var_dump(get_the_id()); ?>
        <?php echo get_category(get_the_id()) ?>
      </div>
      <div class="icon-music-play">
        <i class="fas fa-music"></i>
      </div>
    </div>
    <div class="music__related-title">
      <a rel="nofollow" target="_blank" href="<? the_permalink()?>"><?php the_title(); ?></a>
    </div>
  </div>
  <? }
  }
  $post = $orig_post;
  wp_reset_query();
  ?>
  </div>
</div>
