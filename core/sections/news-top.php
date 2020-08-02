<div class="topnews">
    <div class="tn__container">
        <div class="tn__post-container"
            data-flickity='{ "autoPlay": false,"fade": true, "pauseAutoPlayOnHover": false, "pageDots": false,"draggable": true,"groupCells": 4,"wrapAround": true,"prevNextButtons": false }'>
            <?php 
    $args=array(
      'post_type' => 'post',
      'post_status' => 'publish',
      'showposts' => 12
    );
    $the_query = new WP_Query($args);
    $flag=1;
      while($the_query->have_posts()):$the_query->the_post();
      echo '<div class="tn__post-item-'.$flag.'">';
    ?>
            <div class="tn__post-item-content position--relative">
                <div class="tn__post-thumb">
                    <img class="d--block" src="<?php echo hk_get_thumb(get_the_id(),538,455) ?>" alt="Image">
                </div>
                <div class="tn__post-info position--absolute">
                    <div class="tn__post-cate--title">
                        <?php
          $categories=get_the_category(get_the_id());
          $i=0;
            foreach ($categories as $c) {
              $category_link = get_category_link($c->cat_ID);
              if($i===0){
                echo '<span class="category-title text--upcase"><a href="'.$category_link.'">'.$c->cat_name.'</a></span>';}
                $i++;
            } ?>
                    </div>
                    <div class="tn__post-title eclips"><a
                            href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a>
                    </div>
                    <!-- <div class="tn__post-author-date open-sanrif">
                      <span class="tn__post-author"><?php //the_author_link(); ?></span>
                      <span class="dot"> - </span>
                      <span class="tn__post-date"> <?php //echo get_the_date( 'F j, Y' ); ?></span>
                    </div> -->
                </div>
            </div>
        </div>
        <?php
            $flag++;
            if($flag>4){
              $flag=1;
            }
  endwhile;
    ?>
    </div>
</div>
</div>