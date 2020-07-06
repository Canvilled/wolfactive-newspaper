<div class="news-music">
  <div class="news-music-container row-divide my-50">
    <?php
      $args = array(
        'post_type'=>'post',
        'post_status'=>'publish',
        'category_name'=>'music',
        'showposts' => 3,
      );
      $music_query = new WP_Query($args);
      while($music_query->have_posts()):$music_query->the_post();
      ?>
        <div class="mi-container col-divide-4">
          <div class="mi__image">
            <a href="<?php echo get_permalink(); ?>">
              <img class="img-music" src="<?php echo hk_get_thumb(get_the_id(),485,360) ?>" alt="Image">
            </a>
            <div class="icon-music-play">
              <i class="fas fa-music"></i>
            </div>
            <div class="mi__info">
              <div class="mi__category">
                <span class="title__cat">
                  <?php
                  $category_link = get_category_link(get_cat_id( 'music' ));?>
                  <a href="<?php echo $category_link ?>"><?php echo get_cat_name( get_cat_id( 'music' ) ); ?></a>
                </span>
              </div>
               <div class="mi__title text--upcase">
                  <span> <a href="<?php the_permalink() ?>"><?php the_title(); ?></a> </span>
               </div>
               <div class="mi__editor-date open-sanrif">
                 <span class="editor"><?php the_author_link(); ?></span> -
                 <span class="date-time"><?php echo get_the_date( 'F j, Y' ); ?></span>
               </div>
            </div>
          </div>
        </div>
      <?php
      endwhile;
     ?>
  </div>
</div>
