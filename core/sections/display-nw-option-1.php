<div class="nw__label myt-50" style="border-bottom:2px solid <?php echo get_sub_field('background_color','option'); ?>">
  <h3 class="label-item roboto" style="background-color:<?php echo get_sub_field('background_color','option');  ?>"><?php echo get_sub_field('label','option'); ?></h3>
  <div class="news__category-related">
    <ul class="category-related__container">
      <?php
      $cat = get_sub_field('category','option');
        $categories=get_categories(array( 'child_of' => $cat )
        );
        if($categories){
          ?>
          <li class="sub__category"><a class="roboto" href="<?php echo site_url(); ?>">All</a></li>
          <?php
        }
        foreach ($categories as $c) {
          $category_link = get_category_link($c->cat_ID);
          echo '<li class="sub__category"><a class="roboto" href="'.$category_link.'">'.$c->cat_name.'</a></li>';
        }
       ?>
    </ul>
  </div>
</div>
<div class="nw__content row-divide myt-20">
  <?php
  $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
  $get_cat_id = get_sub_field('category','option');
  $args = array(
    'cat' => $get_cat_id,
    'post_type' => 'post',
    'post_status' => 'publish',
    'paged'=>$paged,
    'posts_per_page' => '5',
  );
  $query_post_from_cat = new WP_Query($args);
  $j=0;
  for($i=0 ; $i<=1; $i++)
  {
    if($i===0)
    {
      ?>
      <div class="col-divide-6 nw__left-content td-1"><?php
      while($query_post_from_cat->have_posts()):$query_post_from_cat->the_post();
        if($j===0){
          ?>
          <div class="nw__image">
            <a href="<?php echo get_permalink(); ?>"><img src="<?php echo hk_get_thumb(get_the_id(),485,360) ?>" alt="Image"></a>
          </div>
          <div class="nw__post-title">
            <a href="<?php echo get_permalink(); ?>"><?php the_title();?></a>
          </div>
          <div class="nw__editor-date">
            <span class="editor"><?php the_author_link(); ?></span> -
            <span class="date-time"><?php echo get_the_date( 'F j, Y' ) ?></span>
            <span class="comment"> <a href="#">1</a> </span>
          </div>
          <div class="nw__post-content open-sanrif">
            <?php echo wp_trim_words( get_the_content(), 15, '...' ); ?>
          </div>
          <?php
          $j++;
          break;
        }
      endwhile;
      ?></div>
      <?php
    }
    else{
      ?>
      <div class="col-divide-6 nw__right-content td-1"><?php
      // Đạt đang code đến đây
      while($query_post_from_cat->have_posts()):$query_post_from_cat->the_post();
        if($j>=1){
          ?>
          <div class="nw__right-content--item row-divide">
            <div class="nw__image col-divide-4">
              <a href="<?php echo get_permalink(); ?>"><img src="<?php echo hk_get_thumb(get_the_id(),485,360) ?>" alt="Image"></a>
            </div>
            <div class="nw__infomation col-divide-8">
              <div class="nw__post-title">
                <a href="<?php echo get_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 10, '...' ); ?></a>
              </div>
              <div class="nw__editor-date">
                <span class="date-time"><?php echo get_the_date( 'F j, Y' ); ?></span>
              </div>
            </div>
          </div>
          <?php
        }
      endwhile;
      ?></div>
      <?php
    }
    ?>

    <?php
  }?>
</div>
