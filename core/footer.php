    <section class="footer">
	    <!----------=========Main==========-------->
	  <div class="footer__main main--background">
    	<div class="footer__container">
    		<div class="footer__list row-divide">
    			<div class="col-divide-2"></div>
    			<div class="footer__wrapper col-divide-8">
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
	  </div>
	    <!----------=========Main==========-------->

		<!----------=========Sub==========-------->
	  <div class="footer__sub">
	    <div class="container"><p class="text--center">All Right Reserved.</p></div>
	  </div>
	    <!----------=========Sub==========-------->
 </section>
 <?php wp_footer(); ?>
 </body>
</html>
