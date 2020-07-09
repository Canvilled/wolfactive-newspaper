 <?php
 get_header();
 get_template_part('sections/breadcum');

?>
 <section class="wrapper" id="singlePost">
   <div class="banner__category-post">
     <?php
     $categories = get_the_category();
     foreach ($categories as $cat) {
       if($cat->name === "Music"){
         $id=$cat->cat_ID;
         $category= get_category($id);
         $category_link = get_category_link($id);
         $image = get_field('banner_category',$category);
         $color = get_field('color_category',$category);
         ?>
         <div class="banner-music position--relative">
           <img src="<?php echo $image ?>" alt="banner__image">
           <div class="cat-tit-music">
             <div class="category-name text--center">
               <?php echo '<a href="'.$category_link.'" style="background:'.$color.'">'.$cat->name.'</a></li>'; ?>
             </div>
             <div class="title-music">
               <?php the_title(); ?>
             </div>
             <div class="author-date row-divide">
               <div class="author row-divide">
                 <?php echo get_avatar(get_the_author_meta( 'ID' )); ?>
                 <div class="author-name open-sanrif"><span> By </span><?php the_author_link() ?></div>
               </div>
               <div class="date open-sanrif"><?php echo get_the_date(); ?></div>
               <div class="views-count">
                 <?php echo getPostViews(get_the_id()) ?> Views
               </div>
             </div>
           </div>
         </div>
         <?php
       }
     }
      ?>
   </div>
   <div class="single__wrapper row-divide">
     <div class="col-divide-2"></div>
     <div class="post__wrapper col-divide-8 row-divide my-40">
       <?php
       if ( have_posts() ) {
         // Load posts loop.
         while ( have_posts() ) {
           the_post();
           setPostViews(get_the_ID());
           ?>
           <div class="post__item-des myt-20">
             <span class="text--dark row-divide post__category">
               <?php
                     foreach ($categories as $cat) {
                       ?>
                       <div class="category-item">
                         <?php echo esc_html( $cat->name ); ?>
                       </div>
                       <?php
                     }
               ?>
             </span>
             <h1 class="title--section my-6"><?php the_title(); ?></h1>
           </div>
           <div class="row-divide post__wrapper-container col-divide-sm-12">
             <div class="col-divide-8 post__contain">
               <div class="author-date row-divide">
                 <div class="author col-divide-6 row-divide text--dark"><?php echo get_avatar(get_the_author_meta( 'ID' )); ?> <div class="author-name text--upcase open-sanrif"><?php the_author(); ?></div> </div>
                 <div class="date col-divide-6 text--dark open-sanrif text--upcase"><?php echo get_the_date(); ?></div>
               </div>
               <div class="thumbnail max--height--400"><?php the_post_thumbnail('large') ?></div>
              <div class="post__item-content">
                <span class="date text--dark"><?php gt_set_post_view(); ?></span>
                <?php the_content() ?>
              </div>
            <?php } ?>
            <div class="navigation myt-20 row-divide">
              <div class="previous__post col-divide-6">
                <?php previous_post_link('PREVIOUS ARTICLE %link', '%title'); ?>
              </div>
              <div class="next__post col-divide-6">
                <?php next_post_link('NEXT ARTICLE %link', '%title');?>
              </div>
            </div>
            <?php get_template_part( '/sections/related-post' ) ?>
             </div>
             <div class="col-divide-4 singlePost-sidebar">
               <?php if (dynamic_sidebar('single-sidebar')) : get_sidebar( 'single-sidebar' ); ?><?php endif; ?>
             </div>
           </div>
           <?php
         	}
          ?>
         </div>
     <div class="col-divide-2"></div>
   </div>
 </section>
<?php
 get_footer();
?>
