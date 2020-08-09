<div class="nw__content td-4 my-20">
    <?php
    $args = array(
      'cat' => $cat_id,
      'post_type' => 'post',
      'post_status' => 'publish',
      'showposts' => '5',
    );
    $query_post_from_cat = new WP_Query($args);
    while($query_post_from_cat->have_posts()):$query_post_from_cat->the_post();
     ?>
    <div class="nw__post-item row-divide">
      <div class="nw__image col-divide-4">
        <a href="<?php echo get_permalink(); ?>"><img src="<?php echo hk_get_thumb(get_the_id(),485,360) ?>" alt="Image"></a>
      </div>
      <div class="nw__infomation col-divide-8">
        <div class="nw__post-title eclips">
          <a href="<?php echo get_permalink(); ?>"><?php the_title();?></a>
        </div>
        <div class="nw__editor-date">
          <span class="editor"><?php the_author_link(); ?></span> -
          <span class="date-time"><?php echo get_the_date( 'F j, Y' ) ?></span>
          <span class="comment"><?php echo get_comments_number(get_the_id()) ?></span>
        </div>
        <div class="nw__post-content open-sanrif">
          <?php echo wp_trim_words( get_the_content(), 20, '...' ); ?>
        </div>
      </div>
    </div>
    <?php   endwhile; ?>
  </div>