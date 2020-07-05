<?php
$cat_id = get_sub_field('category','option');
$cate_child=get_term_children($cat_id,'category');
 ?>
<div class="nw__label myt-50" style="border-bottom:2px solid <?php echo get_sub_field('background_color','option'); ?>">
  <h3 class="label-item roboto text--upcase" style="background-color:<?php echo get_sub_field('background_color','option');  ?>"><?php echo get_cat_name( $cat_id ); ?></h3>
  <div class="news__category-related">
    <ul class="category-related__container">
      <?php
      foreach ($cate_child as $child) {
          $child_Obj = get_category($child);
          $category_link = get_category_link($child_Obj->cat_ID);
          echo '<li class="sub__category"><a class="roboto" href="'.$category_link.'">'.$child_Obj->name.'</a></li>';
        }
       ?>
    </ul>
  </div>
</div>
