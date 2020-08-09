<div class="nw__content td-3 my-20">
    <div class="nw__content-post-slide" data-flickity='{ "autoPlay": true, "pauseAutoPlayOnHover": false, "pageDots": false,"draggable": true,"groupCells": 3,"wrapAround": true }'>
      <?php
      $args = array(
        'cat' => $cat_id,
        'post_type' => 'post',
        'post_status' => 'publish',
        'showposts' => '6',
      );
      $query_post_from_cat = new WP_Query($args);
      while($query_post_from_cat->have_posts()):$query_post_from_cat->the_post();
      ?>
        <div class="nw__post-slide--item">
          <div class="nw__image">
            <a href="<?php echo get_permalink(); ?>"><img src="<?php echo hk_get_thumb(get_the_id(),485,360) ?>" alt="Image"></a>
            <div class="nw__category">
              <?php
              $categories=get_the_category(get_the_id());
              $i=0;
                foreach ($categories as $c) {
                  $category_link = get_category_link($c->cat_ID);
                  if($i===0){
                    echo '<span class="category-title"><a href="'.$category_link.'">'.$c->cat_name.'</a></span>';}
                    $i++;
                } ?>
            </div>
          </div>
          <div class="nw__post-title eclips">
            <a href="<?php echo get_permalink(); ?>"><?php the_title();?></a>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  </div>