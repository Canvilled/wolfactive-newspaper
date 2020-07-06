    <section class="footer">
	    <!----------=========Main==========-------->
	  <div class="footer__main main--background">
      <div class="bg-color-cover"></div>
    	<div class="footer__container">
    		<div class="footer__list row-divide">
    			<div class="col-divide-2"></div>
    			<div class="footer__wrapper col-divide-8 row-divide">
            <div class="footer__sidebar-left col-divide-4">
              <?php if (dynamic_sidebar('footer-left-sidebar')) : get_sidebar( 'footer-left-sidebar' ); ?><?php endif; ?>
            </div>
            <div class="footer__sidebar-center col-divide-4">
              <?php if (dynamic_sidebar('footer-mid-sidebar')) : get_sidebar( 'footer-mid-sidebar' ); ?><?php endif; ?>
            </div>
            <div class="footer__sidebar-right col-divide-4">
              <?php if (dynamic_sidebar('footer-right-sidebar')) : get_sidebar( 'footer-right-sidebar' ); ?><?php endif; ?>
            </div>
          </div>
          <div class="col-divide-2"></div>
    		</div>
    	</div>
      <!----------=========Sub==========-------->
      <div class="divine-footer container"></div>
      <div class="footer__sub">
        <div class="footer__sub-background row-divide">
          <div class="col-divide-2"></div>
          <div class="logo-footer col-divide-2">
            <a href="<?php echo site_url(); ?>" class="d--block footer-logo mr-auto">
              <?php
               $image = get_field('logo_footer','option');
                  ?>
              <img src="<?php echo $image; ?>" alt="logo-newspaper-wolfactive">
            </a>
          </div>
          <div class="about-us col-divide-3">
            <?php if (dynamic_sidebar('footer-sub-mid-sidebar')) : get_sidebar( 'footer-sub-mid-sidebar' ); ?><?php endif; ?>
          </div>
          <div class="follow-us col-divide-3">
            <?php if (dynamic_sidebar('footer-sub-right-sidebar')) : get_sidebar( 'footer-sub-right-sidebar' ); ?><?php endif; ?>
          </div>
          <div class="col-divide-2"></div>
        </div>
  	    <div class="container"><p class="text--center">All Right Reserved.</p></div>
  	  </div>
  	    <!----------=========Sub==========-------->
	  </div>
	    <!----------=========Main==========-------->
 </section>
 <?php wp_footer(); ?>
 </body>
</html>
