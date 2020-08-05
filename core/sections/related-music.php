<?php
  $orig_post = $post;
  global $post;
  $tags = wp_get_post_tags(get_the_id());
  if ($tags) {
    ?>
    <div class="music__related container">
      <h4 class="title__block"> <span>RELATED</span> </h4>
      <div class="music__related-contain myt-20" data-flickity='{ "autoPlay": true, "pauseAutoPlayOnHover": false, "pageDots": false,"draggable": true,"groupCells": 6 }'>
    <?php
  $tag_ids = array();
  foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
  $args=array(
  'tag__in' => $tag_ids,
  'post__not_in' => array(get_the_id()),
  'showposts'=>16,
  'order'=>'DESC',
  'ign_sticky_posts'=>1
  );

  $my_query = new wp_query( $args );

  while( $my_query->have_posts() ): $my_query->the_post();
  ?>
  <div class="music__related-item">
    <div class="music__related-thumb">
      <a rel="nofollow" target="_blank" href="<? the_permalink()?>">
        <img src="<?php echo hk_get_thumb(get_the_id(),150,150) ?>" alt="Image">
      </a>
      <div class="music-category open-sanrif">
        <?php $category_id = get_cat_id('Music');
        $category_link = get_category_link( $category_id );
         ?>
         <a href="<?php echo esc_url( $category_link ); ?>" title="Category Name">Music</a>
      </div>
      <div class="icon-music">
          <i class="fas fa-music"></i>
      </div>
    </div>
    <div class="music__related-title">
      <a rel="nofollow" target="_blank" href="<? the_permalink()?>"><?php the_title(); ?></a>
    </div>
  </div>
  <?php endwhile;
  $post = $orig_post;
  wp_reset_query();
  ?>
  </div>
</div>
<?php }?>