<?php
  $orig_post = $post;
  global $post;
  $tags = wp_get_post_tags(get_the_id());

  if ($tags) {
    ?>
    <div class="relatedposts py-40">
      <h4><span>Related posts</span></h4>
      <div class="relatedposts__contain my-20" data-flickity='{ "autoPlay": true, "pauseAutoPlayOnHover": false, "pageDots": false,"draggable": true,"groupCells": 3 }'>
          <?php
        $tag_ids = array();
        foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
        $args=array(
        'tag__in' => $tag_ids,
        'post__not_in' => array(get_the_id()),
        //'posts_per_page'=>4, // Number of related posts to display.
        'showposts'=>9,
        'order'=>'DESC',
        'ign_sticky_posts'=>1
        );

        $my_query = new wp_query( $args );

        while( $my_query->have_posts() ) {
        $my_query->the_post();
        ?>
        <div class="relatedthumb">
          <a rel="nofollow" target="_blank" href="<? the_permalink()?>">
            <img src="<?php echo hk_get_thumb(get_the_id(),220,130) ?>" alt="Image">
          </a>
          <div class="info__relatedpost">
            <div class="title__relatedpost">
              <a rel="nofollow" target="_blank" href="<? the_permalink()?>"><?php the_title(); ?></a>
              <div class="date__relatedpost">
                <?php echo get_the_date( 'F j, Y' ); ?>
              </div>
            </div>
          </div>
        </div>
        <? }
        ?>
      </div>
    </div>
  <?php
  }
  // $post = $orig_post;
  wp_reset_query();
  ?>
