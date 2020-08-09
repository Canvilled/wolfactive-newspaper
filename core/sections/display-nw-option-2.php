<div class="nw__content row-divide my-20 td-2">
    <?php
    $args = array(
      'cat' => $cat_id,
      'post_type' => 'post',
      'post_status' => 'publish',
      'showposts' => '8',
    );
    $query_post_from_cat = new WP_Query($args);
    $i=0;
    while($query_post_from_cat->have_posts()):$query_post_from_cat->the_post();
        if($i<2)
        {
            ?>
            <div class="nw__post-item nw__main-post-item col-divide-6 col-divide-md-12">
                <div class="nw__image">
                    <a href="<?php echo get_permalink(); ?>"><img src="<?php echo hk_get_thumb(get_the_id(),485,360) ?>" alt="Image"></a>
                </div>
                <div class="nw__post-title eclips">
                    <a href="<?php echo get_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 10, '...' );?></a>
                </div>
                <div class="nw__editor-date">
                    <span class="editor"><?php the_author_link(); ?></span> -
                    <span class="date-time"><?php echo get_the_date( 'F j, Y' ); ?></span>
                    <span class="comment"><?php echo get_comments_number(get_the_id()) ?></span>
                </div>
                <div class="nw__post-content open-sanrif">
                    <?php echo wp_trim_words( get_the_content(), 15, '...' ); ?>
                </div>
                </div>
            <?php
        }
        else{
            ?>
            <div class="nw__post-item nw__child-post-item col-divide-6 col-divide-md-12 row-divide">
              <div class="nw__image col-divide-4">
                <a href="<?php echo get_permalink(); ?>"><img src="<?php echo hk_get_thumb(get_the_id(),485,360) ?>" alt="Image"></a>
              </div>
              <div class="nw__infomation col-divide-8">
                <div class="nw__post-title eclips">
                  <a href="<?php echo get_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 10, '...' );?></a>
                </div>
                <div class="nw__editor-date">
                  <span class="date-time"><?php echo get_the_date( 'F j, Y' ) ?></span>
                </div>
              </div>
            </div>
            <?php
        }
    $i++;
    endwhile;
    ?>
  </div>