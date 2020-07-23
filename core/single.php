 <?php
 get_header();
 get_template_part('sections/breadcum');
 setPostViews(get_the_id());
?>
 <section class="wrapper" id="singlePost">
   <div class="single__wrapper">
     <div class="post__item-des myt-20 container">
        <div class="text--dark row-divide post__category">
               <?php
               $categories = get_the_category();
                   if ( ! empty( $categories ) ) {
                     foreach ($categories as $child) {
                         $child_Obj = get_category($child);
                         $category_link = get_category_link($child_Obj->cat_ID);
                         $color = get_field('color_category',$child_Obj);
                         echo '<div class="sub__category" style="background:'.$color.'"><a href="'.$category_link.'">'.$child_Obj->name.'</a></div>';
                       }
                   }
               ?>
        </div>
        <h1 class="title--section my-6"><?php the_title(); ?></h1>
     </div>
     <?php while (have_posts()):the_post();
      ?>
      <div class="row-divide post__wrapper-container container">
          <div class="col-divide-8 col-divide-sm-12 post__contain">
               <div class="author-date row-divide">
                 <div class="author col-divide-6 row-divide text--dark"><?php echo get_avatar(get_the_author_meta( 'ID' )); ?> <div class="author-name text--upcase open-sanrif"><?php the_author_link(); ?></div> </div>
                 <div class="date col-divide-6 text--dark open-sanrif text--upcase"><span class="date-post text--dark"><?php echo get_the_date(); ?></span><span class="view-counts text--dark"><i class="far fa-eye"></i><?php echo getPostViews(get_the_id()) ?></span></div>
               </div>
               <div class="thumbnail max--height--400"><?php the_post_thumbnail('large') ?></div>
               <div class="social__share-post-1">
                 <?php get_template_part('sections/social-share') ?>
               </div>
              <div class="post__item-content">
                <?php the_content() ?>
              </div>
              <div class="social__share-post-2">
                <?php get_template_part('sections/social-share') ?>
              </div>
            <div class="navigation myt-20 row-divide">
              <div class="previous__post col-divide-6">
                <?php previous_post_link('PREVIOUS ARTICLE %link', '%title'); ?>
              </div>
              <div class="next__post col-divide-6">
                <?php next_post_link('NEXT ARTICLE %link', '%title');?>
              </div>
            </div>
            <?php get_template_part( '/sections/author' ) ?>
            <?php get_template_part( '/sections/related-post' ) ?>
          </div>
          <div class="col-divide-4 singlePost-sidebar">
            <?php if (dynamic_sidebar('single-sidebar')) : get_sidebar( 'single-sidebar' ); ?><?php endif; ?>
          </div>
        </div>
      <?php
    endwhile;?>
    </div>
   </div>
 </section>
<?php
 get_footer();
?>
