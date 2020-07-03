<div class="nw">
  <div class="nw__container row-divide">
    <div class="nw__background col-divide-8">
      <?php
      if(have_rows('categories_and_post','option'))
      {
        while (have_rows('categories_and_post','option')) : the_row();
        $type_display = get_sub_field('type_display','option');
        switch ($type_display) {
          case 1:
            get_template_part('/sections/display-nw-option-1');
            break;
          case 2:
            get_template_part('/sections/display-nw-option-2');
            break;
          case 3:
            get_template_part('/sections/display-nw-option-3');
            break;
          default:
            // code...
            break;
        }
        endwhile;
      }?>
    </div>
    <div class="nw__sidebar col-divide-4">
      <?php get_sidebar('left-sidebar'); ?>
    </div>
  </div>
</div>
