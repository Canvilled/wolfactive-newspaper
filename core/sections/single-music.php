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
