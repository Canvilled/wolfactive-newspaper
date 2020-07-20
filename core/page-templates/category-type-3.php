<?php $cat_id = get_query_var('cat'); ?>
<div class="category-opt3 myt-50">
  <div class="cat__head-container container">
    <div class="cat__breadcumbs open-sanrif">
      <?php get_template_part('sections/breadcums')?>
    </div>
    <div class="cat__single-title">
      <h1 class="cat-title-block text--upcase"><?php single_cat_title() ?></h1>
    </div>
    <div class="cat__sub-container open-sanrif">
      <?php $cate_child=get_categories(array( 'parent' => $cat_id ));
      foreach ($cate_child as $child) {
          $child_Obj = get_category($child);
          $category_link = get_category_link($child_Obj->cat_ID);
          echo '<div class="cat__sub-item"><a href="'.$category_link.'">'.$child_Obj->name.'</a></div>';
        }
       ?>
    </div>
    <div class="cat__description open-sanrif">
      <?php echo category_description($cat_id); ?>
    </div>
  </div>
  <div class="cat__new-post">
    <div class="cat__new-post--container my-50 row-divide">
      <?php
      $args = array(
        'cat'=>$cat_id,
        'post_status'=>'publish',
        'order'=> 'DESC',
        'showposts'=>'4',
      );
      $top_query=new WP_Query($args);
      while($top_query->have_posts()):$top_query->the_post();
       ?>
       <div class="cat__new-post--item col-divide-3 col-divide-md-12">
         <div class="np__thumbs">
           <img src="<?php echo hk_get_thumb(get_the_id(),480,480) ?>" alt="Image">
         </div>
         <div class="cat__new-post--information">
           <div class="np__child-cat open-sanrif">
             <?php
             $categories=get_the_category(get_the_id());
             $i=0;
               foreach ($categories as $c) {
                 $category_link = get_category_link($c->cat_ID);
                 if($i===1){
                   echo '<span class="category-title "><a href="'.$category_link.'">'.$c->cat_name.'</a></span>';}
                   $i++;
               } ?>
           </div>
           <div class="np__title open-sanrif">
             <a href="<?php echo get_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 15, '...' );?></a>
           </div>
           <div class="np__author-date">
             <span class="author-name"><?php the_author_link(); ?></span>
             <span class="dash">-</span>
             <span class="date-post"><?php echo get_the_date( 'F j, Y' ); ?></span>
           </div>
         </div>
       </div>
     <?php endwhile; ?>
    </div>
  </div>
  <div class="cat__post-container">
    <div class="cat__post-wrapper container row-divide">
      <div class="cat__post-content col-divide-8 col-divide-md-12">
        <?php
        while(have_posts()):the_post();
         ?>
         <div class="cat__post-content--item row-divide my-20">
           <div class="cp__thumb col-divide-4">
             <a href="<?php echo get_permalink(); ?>"><img src="<?php echo hk_get_thumb(get_the_id(),250,160) ?>" alt="Image"></a>
           </div>
           <div class="cp__information col-divide-8">
             <div class="cp__child-cat open-sanrif">
               <?php
               $categories=get_the_category(get_the_id());
               $i=0;
                 if($categories){
                   foreach ($categories as $c) {
                     $category_link = get_category_link($c->cat_ID);
                     if($i===1){
                       echo '<span class="category-title "><a href="'.$category_link.'">'.$c->cat_name.'</a></span>';}
                       $i++;
                   }
                 } ?>
             </div>
             <div class="cp__title open-sanrif">
               <a href="<?php echo get_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 15, '...' );?></a>
             </div>
             <div class="cp__author-date">
               <span class="author-name"><?php the_author_link(); ?></span>
               <span class="dash">-</span>
               <span class="date-post"><?php echo get_the_date( 'F j, Y' ); ?></span>
               <span class="view-count"><?php echo getPostViews(get_the_id()); ?></span>
             </div>
           </div>
         </div>
       <?php endwhile; ?>
       <div class="Category__pagination my-20">
         <?php the_posts_pagination();?>
         <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                global $wp_query;
                //$category = get_category($cat_id);
                // $total_post_count = wp_count_posts();
                // $published_post_count = $total_post_count->publish;
                $total_pages = $wp_query->max_num_pages;
                ?>
                <div class="page-of-total">
                  <?php echo $paged.' of '.$total_pages; ?>
                </div>
                <?php
         ?>
       </div>
      </div>
      <div class="cat__sidebar col-divide-4 col-divide-md-12">

      </div>
    </div>
  </div>
</div>
