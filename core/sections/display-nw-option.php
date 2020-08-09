<?php
$cat_id = get_sub_field('category','option');
$cate_child=get_term_children($cat_id,'category');
$type_display = get_sub_field('type_display','option');
 ?>
<div class="nw__label myt-50" style="border-bottom:2px solid <?php echo get_sub_field('background_color','option'); ?>">
  <h3 class="label-item roboto text--upcase" style="background-color:<?php echo get_sub_field('background_color','option');  ?>"><?php echo get_cat_name( $cat_id ); ?></h3>
  <div class="news__category-related">
    <?php if(!wp_is_mobile()){ ?>
    <ul class="category-related__container">
      <?php
      foreach ($cate_child as $child) {
          $child_Obj = get_category($child);
          $category_link = get_category_link($child_Obj->cat_ID);
          echo '<li class="sub__category"><a href="'.$category_link.'">'.$child_Obj->name.'</a></li>';
        }
       ?>
    </ul>
  <?php } ?>
    <?php if(wp_is_mobile())
    {
      ?>
      <div class="news__category-more position--relative">
        <button id="Moreclick" onclick="openCatSub()"> More <i class="fas fa-angle-down"></i> </button>
          <ul class="sub__cat-list" id="catChild">
            <?php
            foreach ($cate_child as $child) {
                $child_Obj = get_category($child);
                $category_link = get_category_link($child_Obj->cat_ID);
                echo '<li class="sub__category"><a href="'.$category_link.'">'.$child_Obj->name.'</a></li>';
              }
            ?>
          </ul>
      </div>
      <?php
    }
     ?>
  </div>
</div>
<?php
switch ($type_display) {
  case 1:
    get_template_part('sections/display-nw-option-1');
    break;
  case 2:
    get_template_part('sections/display-nw-option-2');
    break;
  case 3:
    get_template_part('sections/display-nw-option-3');
    break;
  case 4:
    get_template_part('sections/display-nw-option-4');
    break;
  default:
    // code...
    break;
}
 ?>
