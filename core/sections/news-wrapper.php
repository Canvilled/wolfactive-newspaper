<div class="nw">
  <div class="nw__container row-divide">
    <div class="nw__background col-divide-8">
      <?php
      if(have_rows('categories_and_post','option'))
      {
        while (have_rows('categories_and_post','option')) : the_row();
            get_template_part('/sections/display-nw-option');
        endwhile;
      }?>
    </div>
    <div class="nw__sidebar myt-50 col-divide-4">
      <?php if (dynamic_sidebar('left-sidebar')) : get_sidebar( 'left-sidebar' ); ?><?php endif; ?>
    </div>
  </div>
</div>
