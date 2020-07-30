<div class="topnews">
    <div class="tn__container">
        <!-- <div class="left-top-news col-divide-6 col-divide-md-12">
      <?php //get_news_top_post(0,538,455); ?>
    </div>
    <div class="right-top-news col-divide-6 col-divide-md-12">
      <div class="right__news-head">
        <?php //get_news_top_post(1,532,254); ?>
      </div>
      <div class="right__news-tail row-divide">
        <div class="left__tail-post col-divide-6 col-divide-md-12">
          <?php //get_news_top_post(2,264,192); ?>
        </div>
        <div class="right__tail-post col-divide-6 col-divide-md-12">
          <?php //get_news_top_post(3,264,192); ?>
        </div>
      </div>
    </div> -->
        <div class="tn__post-container" data-flickity='{ "autoPlay": false, "pauseAutoPlayOnHover": false, "pageDots": false,"draggable": true,"groupCells": 4,"wrapAround": true }'>
            <?php 
    $args=array(
      'post_type' => 'post',
      'post_status' => 'publish',
      'showposts' => 12
    );
    $the_query = new WP_Query($args);
    $flag=1;
      while($the_query->have_posts()):$the_query->the_post();
      echo '<div class="tn__post-item-'.$flag.'">';
    ?>
            
                <div class="tn__post-thumb">
                    <img class="d--block" src="<?php echo hk_get_thumb(get_the_id(),538,455) ?>" alt="Image">
                </div>
                
            </div>
            <?php
            $flag++;
            if($flag>4){
              $flag=1;
            }
  endwhile;
    ?>
        </div>
    </div>
</div>