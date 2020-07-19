<?php
$cat_id = get_query_var('cat');
$term = get_category($cat_id);
$image = get_field('banner_category',$term);
 ?>
<div class="category-opt1">
  <div class="cat-container">
    <div class="cat__banner-and-title">
      <div class="cat__banner">
        <img src="<?php echo hk_get_image($image, 1920, 480); ?>" alt="Fashion banner">
      </div>
      <div class="cat__infomation container my-20">
        <?php get_template_part('sections/breadcums')?>
        <div class="cat-title myt-50">
          <h1 class="cat-title-block text--upcase"><?php single_cat_title(); ?></h1>
        </div>
        <div class="cat-term">
          <?php $cate_child=get_categories(array( 'parent' => $cat_id ));
          foreach ($cate_child as $child) {
              $child_Obj = get_category($child);
              $category_link = get_category_link($child_Obj->cat_ID);
              $color = get_field('color_category',$child_Obj);
              echo '<div class="sub__category" style="background:'.$color.'"><a href="'.$category_link.'">'.$child_Obj->name.'</a></div>';
            }
           ?>
        </div>
        <div class="cat-description open-sanrif">
          <?php echo category_description($cat_id); ?>
        </div>
      </div>
    </div>
    <div class="cat__post-container container row-divide myt-50">
        <div class="cat__post-wrapper col-divide-8 col-divide-md-12">
          <ul class="cat__post-background">
          <?php
          while(have_posts()) : the_post();
            ?>
            <li class="cat__post-item">
              <div class="cat__post-item--container">
                <div class="cat__post-item--thumb">
                  <a href="<?php echo get_permalink(); ?>"><img src="<?php echo hk_get_thumb(get_the_id(),330,170) ?>" alt="Image"></a>
                  <div class="cat__title-child open-sanrif">
                    <?php
                    $categories=get_the_category(get_the_id());
                    $i=0;
                      foreach ($categories as $c) {
                        $category_link = get_category_link($c->cat_ID);
                        if($i===1){
                          echo '<span class="category-title "><a href="'.$category_link.'">'.$c->cat_name.'</a></span>';}
                          $i++;
                      } ?>
                  </div>
                </div>
                <div class="cat__post-item--infomation">
                  <div class="cat__post-title open-sanrif">
                    <a href="<?php echo get_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 15, '...' );?></a>
                  </div>
                  <div class="cat__post-author-date">
                    <div class="cat__post-author cat__post-date open-sanrif">
                      <span class="author"><?php the_author_link(); ?></span>
                      <span class="date-post"> - <?php echo get_the_date( 'F j, Y' ); ?></span>
                      <span class="view-count"><?php echo getPostViews(get_the_id()); ?></span>
                    </div>
                  </div>
                </div>
              </div>

            </li>
            <?php
          endwhile;
           ?>
           </ul>
           <div class="Category__pagination my-20">
             <?php the_posts_pagination();?>
             <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $total_post_count = wp_count_posts();
                    $published_post_count = $total_post_count->publish;
                    $total_pages = ceil( $published_post_count / 10 );
                    ?>
                    <div class="page-of-total">
                      <?php echo $paged.' of '.$total_pages; ?>
                    </div>
                    <?php
             ?>
           </div>
        </div>
        <div class="cat__sidebar col-divide-4 col-divide-md-12">

        </div>
    </div>
  </div>
</div>
