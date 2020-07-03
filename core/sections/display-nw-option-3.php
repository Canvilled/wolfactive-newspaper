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
<div class="nw__content td-3 my-20">
  <div class="nw__content-post-slide" data-flickity='{ "wrapAround": true, "groupCells": true, "pageDots": false }'>
    <?php
    $get_cat_id = get_sub_field('category','option');
    $args = array(
      'cat' => $get_cat_id,
      'post_type' => 'post',
      'post_status' => 'publish',
      'showposts' => '6',
    );
    $query_post_from_cat = new WP_Query($args);
    while($query_post_from_cat->have_posts()):$query_post_from_cat->the_post();
    ?>
      <div class="nw__post-slide--item">
        <div class="nw__image">
          <a href="<?php echo get_permalink(); ?>"><img src="<?php echo hk_get_thumb(get_the_id(),485,360) ?>" alt="Image"></a>
        </div>
        <div class="nw__post-title">
          <a href="<?php echo get_permalink(); ?>"><?php the_title();?></a>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</div>
