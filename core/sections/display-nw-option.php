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
      <div class="news__category-more">
        <span>More</span>
      </div>
      <div class="news__sub-category-list">
        <ul class="sub__cat-list">
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
    ?>
    <div class="nw__content row-divide myt-20">
      <?php
      $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
      $args = array(
        'cat' => $cat_id,
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
          <div class="col-divide-6 nw__left-content td-1 col-divide-md-12"><?php
          while($query_post_from_cat->have_posts()):$query_post_from_cat->the_post();
            if($j===0){
              ?>
              <div class="nw__image">
                <a href="<?php echo get_permalink(); ?>"><img src="<?php echo hk_get_thumb(get_the_id(),485,360) ?>" alt="Image"></a>
              </div>
              <div class="nw__post-title eclips">
                <a href="<?php echo get_permalink(); ?>"><?php the_title();?></a>
              </div>
              <div class="nw__editor-date">
                <span class="editor"><?php the_author_link(); ?></span> -
                <span class="date-time"><?php echo get_the_date( 'F j, Y' ) ?></span>
                <span class="comment"> <a href="#"><?php echo get_comments_number(get_the_id()) ?></a> </span>
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
          <div class="col-divide-6 nw__right-content td-1 col-divide-md-12"><?php
          while($query_post_from_cat->have_posts()):$query_post_from_cat->the_post();
            if($j>=1){
              ?>
              <div class="nw__right-content--item row-divide">
                <div class="nw__image col-divide-4">
                  <a href="<?php echo get_permalink(); ?>"><img src="<?php echo hk_get_thumb(get_the_id(),485,360) ?>" alt="Image"></a>
                </div>
                <div class="nw__infomation col-divide-8">
                  <div class="nw__post-title eclips">
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
      }?>
    </div>
    <?php
    break;
  case 2:
  ?>
  <div class="nw__content row-divide my-20">
    <?php
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $args = array(
      'cat' => $cat_id,
      'post_type' => 'post',
      'post_status' => 'publish',
      'paged'=>$paged,
      'showposts' => '7',
    );
    $query_post_from_cat = new WP_Query($args);
    $j=0;
    for($i=0 ; $i<=1; $i++)
    {
      if($i===0)
      {
        ?>
        <div class="col-divide-6 nw__left-content td-2 col-divide-md-12"><?php
        while($query_post_from_cat->have_posts()):$query_post_from_cat->the_post();
          if($j<=2){
            if($j===0){
            ?>
            <div class="nw__post-item">
              <div class="nw__image">
                <a href="<?php echo get_permalink(); ?>"><img src="<?php echo hk_get_thumb(get_the_id(),485,360) ?>" alt="Image"></a>
              </div>
              <div class="nw__post-title eclips">
                <a href="<?php echo get_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 10, '...' );?></a>
              </div>
              <div class="nw__editor-date">
                <span class="editor"><?php the_author_link(); ?></span> -
                <span class="date-time"><?php echo get_the_date( 'F j, Y' ); ?></span>
                <span class="comment"> <a href="#"><?php echo get_comments_number(get_the_id()) ?></a> </span>
              </div>
              <div class="nw__post-content open-sanrif">
                <?php echo wp_trim_words( get_the_content(), 15, '...' ); ?>
              </div>
            </div>
            <?php
            }
            else{
              ?>
              <div class="nw__post-item row-divide">
                <div class="nw__image col-divide-4">
                  <a href="<?php echo get_permalink(); ?>"><img src="<?php echo hk_get_thumb(get_the_id(),485,360) ?>" alt="Image"></a>
                </div>
                <div class="nw__infomation col-divide-8">
                  <div class="nw__post-title eclips">
                    <a href="<?php echo get_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 10, '...' );?></a>
                  </div>
                  <div class="nw__editor-date">
                    <span class="date-time"><?php echo get_the_date( 'F j, Y' ) ?></span>
                  </div>
                </div>
              </div>
              <?php
            }
            $j++;
          }
          else{
            break;
          }
        endwhile;
        ?></div>
        <?php
      }
      else{
        ?>
        <div class="col-divide-6 nw__right-content td-2 col-divide-md-12"><?php
        while($query_post_from_cat->have_posts()):$query_post_from_cat->the_post();
        if($j>2){
          if($j===3){
          ?>
          <div class="nw__post-item">
            <div class="nw__image">
              <a href="<?php echo get_permalink(); ?>"><img src="<?php echo hk_get_thumb(get_the_id(),485,360) ?>" alt="Image"></a>
            </div>
            <div class="nw__post-title eclips">
              <a href="<?php echo get_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 10, '...' );?></a>
            </div>
            <div class="nw__editor-date">
              <span class="editor"><?php the_author_link(); ?></span> -
              <span class="date-time"><?php echo get_the_date( 'F j, Y' ); ?></span>
              <span class="comment"> <a href="#"><?php echo get_comments_number(get_the_id()) ?></a> </span>
            </div>
            <div class="nw__post-content open-sanrif">
              <?php echo wp_trim_words( get_the_content(), 15, '...' ); ?>
            </div>
          </div>
          <?php
          }
          else{
            ?>
            <div class="nw__post-item row-divide">
              <div class="nw__image col-divide-4">
                <a href="<?php echo get_permalink(); ?>"><img src="<?php echo hk_get_thumb(get_the_id(),485,360) ?>" alt="Image"></a>
              </div>
              <div class="nw__infomation col-divide-8">
                <div class="nw__post-title eclips">
                  <a href="<?php echo get_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 10, '...' );?></a>
                </div>
                <div class="nw__editor-date">
                  <span class="date-time"><?php echo get_the_date( 'F j, Y' ) ?></span>
                </div>
              </div>
            </div>
            <?php
          }
          $j++;
        }
        endwhile;
        ?></div>
        <?php
      }
      ?>
      <?php
    }?>
  </div>
  <?php
    break;
  case 3:
  ?>
  <div class="nw__content td-3 my-20">
    <div class="nw__content-post-slide" data-flickity='{ "autoPlay": false, "pauseAutoPlayOnHover": false, "pageDots": false,"draggable": true,"groupCells": 3 }'>
      <?php
      $args = array(
        'cat' => $cat_id,
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
            <div class="nw__category">
              <?php
              $categories=get_the_category(get_the_id());
              $i=0;
                foreach ($categories as $c) {
                  $category_link = get_category_link($c->cat_ID);
                  if($i===0){
                    echo '<span class="category-title"><a href="'.$category_link.'">'.$c->cat_name.'</a></span>';}
                    $i++;
                } ?>
            </div>
          </div>
          <div class="nw__post-title eclips">
            <a href="<?php echo get_permalink(); ?>"><?php the_title();?></a>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
  <?php
    break;
  case 4:
  ?>
  <div class="nw__content td-4 my-20">
    <?php
    $args = array(
      'cat' => $cat_id,
      'post_type' => 'post',
      'post_status' => 'publish',
      'showposts' => '5',
    );
    $query_post_from_cat = new WP_Query($args);
    while($query_post_from_cat->have_posts()):$query_post_from_cat->the_post();
     ?>
    <div class="nw__post-item row-divide">
      <div class="nw__image col-divide-4">
        <a href="<?php echo get_permalink(); ?>"><img src="<?php echo hk_get_thumb(get_the_id(),485,360) ?>" alt="Image"></a>
      </div>
      <div class="nw__infomation col-divide-8">
        <div class="nw__post-title eclips">
          <a href="<?php echo get_permalink(); ?>"><?php the_title();?></a>
        </div>
        <div class="nw__editor-date">
          <span class="editor"><?php the_author_link(); ?></span> -
          <span class="date-time"><?php echo get_the_date( 'F j, Y' ) ?></span>
          <span class="comment"> <a href="#"><?php echo get_comments_number(get_the_id()) ?></a> </span>
        </div>
        <div class="nw__post-content open-sanrif">
          <?php echo wp_trim_words( get_the_content(), 20, '...' ); ?>
        </div>
      </div>
    </div>
    <?php   endwhile; ?>
  </div>
  <?php
    break;
  case 5:
  ?>
  <div class="nw__content td-5 my-20">

  </div>
  <?php
    break;
  default:
    // code...
    break;
}
 ?>
