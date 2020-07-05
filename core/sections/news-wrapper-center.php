<div class="nw__wrapper-center--container row-divide">
  <div class="nw__wrapper-center--item col-divide-4">
    <?php $get_cat_id_left=get_field('post_center_left','option');
    loops_get_post_center($get_cat_id_left);
    ?>
  </div>
  <div class="nw__wrapper-center--item col-divide-4">
    <?php $get_cat_id_mid=get_field('post_center_mid','option');
    loops_get_post_center($get_cat_id_mid);
     ?>
  </div>
  <div class="nw__wrapper-center--item col-divide-4">
    <?php $get_cat_id_right=get_field('post_center_right','option');
    loops_get_post_center($get_cat_id_right);
     ?>
  </div>
</div>
