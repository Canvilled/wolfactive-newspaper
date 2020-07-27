<?php

get_header();

// wp_rig()->print_styles( 'wp-rig-content' );

?>
<main id="primary" class="site-main">
	<div class="search__wrapper" id="SearchPage">
		<div class="search__content container">
			<?php _e("<h2 style='font-weight:bold;color:#000' class='title-search'>Kết quả tìm kiếm cho: ".get_query_var('s')."</h2>"); ?>
			<div class="search__background row-divide">
				<div class="search__result col-divide-8 col-divide-sm-12">
					<ul class="search__result-container">
				 <?php
						while(have_posts()) : the_post();
					?>
					<li class="search__post-item">
						<div class="search__item-container position--relative">
							<div class="search__item-image">
								<a href="<?php echo get_permalink(); ?>"><?php echo get_the_post_thumbnail( get_the_ID(), 'full', null );?></a>
							</div>
							<div class="bg-cover-color"></div>
							<div class="search__item-tag--post">
								<?php
								$tags = get_the_tags();
								if ($tags) {
									$i=0;
									foreach( $tags as $tag ) {
										if($i===0) {echo '<span class="tags-item text--upcase"><a href="'.get_permalink().'">'.$tag->name.'</a></span>';}
										$i++;
									}
								}  ?>
							</div>
							<div class="search__item-content">
								<div class="search__item-title">
									<h3 class="search__post-name text--upcase"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
								</div>
								<div class="search__post-date">
									<p class="date__post"><span class="by-date">Date: </span><?php echo get_the_date(); ?></p>
								</div>
							</div>
						</div>
					</li>
				 <?php endwhile ?>
				 </ul>
				</div>
				<div id="sidebar" class="sidebar__contain col-divide-4 col-divide-sm-12">
					<?php if (dynamic_sidebar('single-sidebar')) : get_sidebar( 'single-sidebar' ); ?><?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</main><!-- #primary -->
<?php
get_sidebar();
get_footer();
