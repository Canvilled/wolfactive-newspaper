 <?php
 get_header();
 get_template_part('sections/breadcum');
 setPostViews(get_the_id());
?>
 <section class="wrapper" id="singlePost">
   <div class="single__category-post">
     <?php
     $categories = get_the_category();
     foreach ($categories as $cat) {
       if($cat->name === "Music"){
         $id=$cat->cat_ID;
         $cat_name=$cat->name;
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
             <div class="title-music text--center">
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
         <div class="single__music-wrapper">
           <div class="music__wrapper">
             <div class="music py-40 container">
               <div class="music-content">
                 <?php the_content(); ?>
               </div>
             </div>
           </div>
           <?php get_template_part( 'sections/related-music' ) ?>
         </div>
         <?php
       }
     }
      ?>
   </div>
 </section>
<?php
 get_footer();
?>
