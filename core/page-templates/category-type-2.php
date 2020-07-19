<?php $cat_id = get_query_var('cat'); ?>
<div class="category-opt2">
  <div class="cat__container container">
    <div class="cat__title my-50">
      <h1 class="cat__title-block"><?php single_cat_title() ?></h1>
      <div class="breadcumb">
        <div class="breadcums-content open-sanrif text--upcase">
          <?php
          get_template_part('sections/breadcums');
          $cate_child=get_categories(array( 'parent' => $cat_id ));
          foreach ($cate_child as $child) {
              $child_Obj = get_category($child);
              $category_link = get_category_link($child_Obj->cat_ID);
              echo '<div class="sub__category"> <span class="divide"> / </span> <a href="'.$category_link.'">'.$child_Obj->name.'</a></div>';
            }
           ?>
        </div>
      </div>
    </div>
    <div class="cat__wrapper row-divide ">
      <div class="cat__post-container col-divide-8">
        <?php while(have_posts()) : the_post(); ?>
        <div class="cat__post-item row-divide">
          <div class="cat__post-infomation col-divide-4">
            <div class="post__category">
              <a href="<?php echo get_category_link($cat_id) ?>"><?php single_cat_title() ?></a>
            </div>
            <div class="post__title">
              <?php the_title(); ?>
            </div>
            <div class="post__excerpt myt-10">
              <?php echo wp_trim_words( get_the_content(), 25, '...' ); ?>
            </div>
            <div class="post__date open-sanrif text--upcase myt-10">
              <?php echo get_the_date( 'F j, Y' ); ?>
            </div>
          </div>
          <div class="cat__post-thumb col-divide-8">
            <div class="post__thumb">
              <a href="<?php echo get_permalink(); ?>"><img src="<?php echo hk_get_thumb(get_the_id(),420,250) ?>" alt="Image"></a>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
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
      <div class="cat__sidebar col-divide-4">

      </div>
    </div>
  </div>
</div>
