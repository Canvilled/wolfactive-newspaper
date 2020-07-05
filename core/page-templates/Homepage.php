 <?php
 /**
 * template name: Home Page
 */
 get_header();
 ?>
<div class="body-background">
  <div class="row-divide wrapper">
    <div class="col-divide-2 left-sidebar"></div>
    <div class="col-divide-8 main__wrapper">
      <?php get_template_part('/sections/slick-trend-post') ?>
      <?php get_template_part('/sections/news-top') ?>
      <?php get_template_part('/sections/news-wrapper') ?>
      <?php get_template_part('/sections/news-image-banner') ?>
      <div class="nw__wrapper-center">
        <?php get_template_part('/sections/news-wrapper-center') ?>
      </div>
      <?php get_template_part('/sections/news-music') ?>
      <?php get_template_part('/sections/news-image-banner') ?>
    </div>
    <div class="col-divide-2 right-sidebar">
    </div>
  </div>
</div>
 <?php
 get_footer();
?>
