<div class="news-wrapper">
  <div class="news-wrapper__container row-divide">
    <div class="news-wrapper__background col-divide-8">
      <?php
      if(have_rows('categories_and_post','option'))
      {
        while (have_rows('categories_and_post','option')) : the_row(); ?>
          <div class="news-wrapper__label myt-50" style="border-bottom:2px solid <?php echo get_sub_field('background_color','option'); ?>">
            <h3 class="label-item roboto" style="background-color:<?php echo get_sub_field('background_color','option');  ?>"><?php echo get_sub_field('label','option'); ?></h3>
            <div class="news__category-related">
              <ul class="category-related__container">
                <?php
                $cat = get_sub_field('category','option');
                if($cat){
                  ?><li class="sub__category"><a class="roboto" href="<?php echo site_url(); ?>">All</a></li><?php
                  $categories=get_categories(
                    array( 'parent' => $cat )
                  );
                  foreach ($categories as $c) {
                    $category_link = get_category_link($c->cat_ID);
                    echo '<li class="sub__category"><a class="roboto" href="'.$category_link.'">'.$c->cat_name.'</a></li>';
                  }
                }
                 ?>
              </ul>
            </div>
          </div>
          <div class="news-wrapper__content myt-20">
            <?php
              $get_cat_id = get_sub_field('category','option');
              $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
              $query_post_from_cat = array(
                'cat_id' => $get_cat_id,
                'post_type' => 'post',
                'post_status' => 'publish',
                'paged'=>$paged,
                'posts_per_page' => '5',
              );
            ?>

          </div>
        <?php endwhile;}?>
    </div>
    <div class="news-wrapper__sidebar col-divide-4">

    </div>
  </div>
</div>
