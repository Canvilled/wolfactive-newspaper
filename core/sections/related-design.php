<?php
  $orig_post = $post;
  global $post;
  $tags = wp_get_post_tags(get_the_id());
  if ($tags) {
    ?>
    <div class="sdp__related container">
      <h4 class="title__block"> <span>RELATED ARTICLES</span> </h4>
      <div class="sdp__related-contain myt-20" data-flickity='{ "autoPlay": true, "pauseAutoPlayOnHover": false, "pageDots": false,"draggable": true,"groupCells": 2 }'>
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

  while( $my_query->have_posts() ) {
  $my_query->the_post();
  ?>
  <div class="sdp__related-item">
    <div class="sdp__related-thumb">
      <a rel="nofollow" target="_blank" href="<? the_permalink()?>">
        <img src="<?php echo hk_get_thumb(get_the_id(),340,200) ?>" alt="Image">
      </a>
      <div class="sdp-category open-sanrif">
        <?php $category_id = get_cat_id('Architecture');
        $category_link = get_category_link( $category_id );
         ?>
         <a href="<?php echo esc_url( $category_link ); ?>" title="Category Name">Architecture</a>
      </div>
    </div>
    <div class="sdp__related-title text--upcase">
      <a rel="nofollow" target="_blank" href="<? the_permalink()?>"><?php the_title(); ?></a>
    </div>
  </div>
  <? }
  ?>
  </div>
</div>
  <?php
  }
  $post = $orig_post;
  wp_reset_query();
  ?>
