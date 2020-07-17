<?php
$term = get_queried_object();
$cat_id = get_query_var('cat');
$image = get_field('banner_category',$term);
 ?>
<div class="category-opt1">
  <div class="cat-container">
    <div class="cat__banner-and-title">
      <div class="cat__banner">
        <img src="<?php echo hk_get_image($image, 1920, 480); ?>" alt="Fashion banner">
      </div>
      <div class="cat__infomation container">
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
  </div>
</div>
