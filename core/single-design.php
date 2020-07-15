<?php
get_header();
setPostViews(get_the_id());
$categories = get_the_category();
foreach ($categories as $cat) {
  if($cat->name === "Design"){
    $id=$cat->cat_ID;
    $cat_name=$cat->name;
    $category= get_category($id);
    $category_link = get_category_link($id);
    $image = get_field('banner_image');
  }
}
 ?>
 <section class="wrapper" id="singlePostDesign">
   <div class="single__design-post">
     <div class="sdp__banner-and-title">
       <div class="sdp__banner">
         <img src="<?php echo hk_get_image($image, 1920, 720); ?>" alt="Design banner">
       </div>
       <div class="sdp__infomation text--center text--upcase">
         <div class="sdp__category open-sanrif">
           <?php
            foreach ($categories as $cat) {
              $id=$cat->cat_ID;
              $cat_name=$cat->name;
              ?>
              <a href="<?php echo get_category_link($id); ?>" class="sdp__category-item"><?php echo $cat_name; ?></a>
              <?php
            }
           ?>
         </div>
         <div class="sdp__title">
           <h1 class="title-desgin-post "><?php the_title(); ?></h1>
         </div>
         <div class="sdp__time-views-admin">
           <div class="sdp__date-time px-30">
             <span class="date-time open-sanrif"><?php echo get_the_date( 'F j, Y' ) ?></span>
           </div>
           <div class="sdp__views-count px-30">
             <span class="views-count"><i class="fas fa-book-open"></i> views <?php echo getPostViews(get_the_id()) ?></span>
           </div>
           <div class="sdp__admin px-30">
             <span class="admin-name"><?php echo get_the_author_link(); ?></span>
           </div>
         </div>
       </div>
     </div>
     <div class="sdp__content">
       <div class="sdp__content-container container row-divide">
         <div class="sdp__content-wrapper col-divide-8">
           <?php get_template_part('sections/social-share') ?>
           <div class="sdp__content-post">
             <?php the_content(); ?>
           </div>
           <?php get_template_part('sections/social-share') ?>
           <div class="navigation myt-20 row-divide">
             <div class="previous__post col-divide-6">
               <?php previous_post_link('<span class="label-navigation">previous article</span> %link', '%title'); ?>
             </div>
             <div class="next__post col-divide-6">
               <?php next_post_link('<span class="label-navigation">next article</span> %link', '%title');?>
             </div>
           </div>
           <?php get_template_part('sections/author') ?>
         </div>
         <div id="sidebar" class="sdp__design col-divide-4">
           <?php if (dynamic_sidebar('single-design-sidebar')) : get_sidebar( 'single-design-sidebar' ); ?><?php endif; ?>
         </div>
       </div>
     </div>
   </div>
 </section>
 <?php
get_footer();
  ?>
