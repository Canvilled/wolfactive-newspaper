<div class="nw__content row-divide myt-20">
      <?php
      $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
      $args = array(
        'cat' => $cat_id,
        'post_type' => 'post',
        'post_status' => 'publish',
        'paged'=>$paged,
        'posts_per_page' => '5',
      );
      $query_post_from_cat = new WP_Query($args);
      $j=0;
      for($i=0 ; $i<=1; $i++)
      {
        if($i===0)
        {
          ?>
          <div class="col-divide-6 nw__left-content td-1 col-divide-md-12"><?php
          while($query_post_from_cat->have_posts()):$query_post_from_cat->the_post();
            if($j===0){
              ?>
              <div class="nw__image">
                <a href="<?php echo get_permalink(); ?>"><img src="<?php echo hk_get_thumb(get_the_id(),485,360) ?>" alt="Image"></a>
              </div>
              <div class="nw__post-title eclips">
                <a href="<?php echo get_permalink(); ?>"><?php the_title();?></a>
              </div>
              <div class="nw__editor-date">
                <span class="editor"><?php the_author_link(); ?></span> -
                <span class="date-time"><?php echo get_the_date( 'F j, Y' ) ?></span>
                <span class="comment"><?php echo get_comments_number(get_the_id()) ?></span>
              </div>
              <div class="nw__post-content open-sanrif">
                <?php echo wp_trim_words( get_the_content(), 15, '...' ); ?>
              </div>
              <?php
              $j++;
              break;
            }
          endwhile;
          ?></div>
          <?php
        }
        else{
          ?>
          <div class="col-divide-6 nw__right-content td-1 col-divide-md-12"><?php
          while($query_post_from_cat->have_posts()):$query_post_from_cat->the_post();
            if($j>=1){
              ?>
              <div class="nw__right-content--item row-divide">
                <div class="nw__image col-divide-4">
                  <a href="<?php echo get_permalink(); ?>"><img src="<?php echo hk_get_thumb(get_the_id(),485,360) ?>" alt="Image"></a>
                </div>
                <div class="nw__infomation col-divide-8">
                  <div class="nw__post-title eclips">
                    <a href="<?php echo get_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 10, '...' ); ?></a>
                  </div>
                  <div class="nw__editor-date">
                    <span class="date-time"><?php echo get_the_date( 'F j, Y' ); ?></span>
                  </div>
                </div>
              </div>
              <?php
            }
          endwhile;
          ?></div>
          <?php
        }
      }?>
    </div>