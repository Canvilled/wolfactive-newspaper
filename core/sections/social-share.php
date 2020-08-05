<div class="social-share">
  <ul class="share-buttons my-20" data-source="simplesharingbuttons.com">
    <li class="share-buttons-item">
      <a class="fb-share-button" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_site_url();?>%2F<?php echo get_post_field( 'post_name', get_post() );?>%2F&quote" title="<?php the_title() ?>" target="_blank">
        <img alt="Share on Facebook" src="<?php echo THEME_URL.'/images' ?>/social_flat_rounded_rects_svg/Facebook.svg" />
        <div class="social-text">
          Facebook
        </div>
      </a>
    </li>
    <li class="share-buttons-item">
      <a class="twitter-share-button" href="https://twitter.com/intent/tweet?source=<?php echo get_site_url();?>%2F<?php echo get_post_field( 'post_name', get_post() );?>%2F" target="_blank" title="Tweet">
        <img alt="Tweet" src="<?php echo THEME_URL.'/images' ?>/social_flat_rounded_rects_svg/Twitter.svg" />
        <div class="social-text">
          Twitter
        </div>
      </a>
    </li>
    <li class="share-buttons-item">
      <a class="pinterset-share-button" href="http://pinterest.com/pin/create/button/?url=<?php echo get_site_url();?>%2F<?php echo get_post_field( 'post_name', get_post() );?>" target="_blank" title="Pin it">
        <img alt="Pin it" src="<?php echo THEME_URL.'/images' ?>/social_flat_rounded_rects_svg/Pinterest.svg" />
        <div class="social-text">
          Pinterest
        </div>
      </a>
    </li>
  </ul>
</div>
