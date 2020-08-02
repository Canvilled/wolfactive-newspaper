<div class="marquee-slick">
  <div class="trending__post row-divide">
    <div class="trend__title col-divide-2 col-divide-md-12">
      <span>TRENDING NOW</span>
    </div>
    <div class="trend__post-list col-divide-10 col-divide-md-12" data-flickity='{ "autoPlay": true, "pauseAutoPlayOnHover": false, "pageDots": false,"draggable": true }'>
      <?php
      $args = array(
        'post_type' => 'post',
        'order' => 'DESC',
        'showposts' => 4,
      );
        $the_query = new WP_Query($args);
        while($the_query->have_posts()):$the_query->the_post();
       ?>
       <div class="title__post">
         <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
       </div>
     <?php endwhile; ?>
    </div>
  </div>
</div>
