<section class="nw__content last__home">
    <div class="nw__content-last container row-divide ">
        <div class="nw__content-last--wrapper col-divide-8 col-divide-md-12">
                <?php 
                    if(have_rows('categories_and_last_post','option'))
                    {
                      while (have_rows('categories_and_last_post','option')) : the_row();
                      ?>
                      <div class="nw__label my-10" style="border-bottom:2px solid <?php echo get_sub_field('background_color','option'); ?>">
                        <h3 class="label-item roboto text--upcase" style="background-color:<?php echo get_sub_field('background_color','option');  ?>"><?php echo get_sub_field('title_display','option'); ?></h3>
                      </div>
                      <div class="nw__content-background row-divide ">
                      <?php
                        $cat_id = get_sub_field('category','option');
                        $args = array(
                            'post_status' => 'publish',
                            'cat' => $cat_id,
                            'showpost' => 8,
                        );
                        $the_query= new WP_Query($args);
                        while ($the_query->have_posts()):$the_query->the_post();
                            ?>
                                <div class="nw__content-last-item col-divide-6 col-divide-md-12 my-10">
                                    <div class="content-last-item-thumb position--relative">
                                        <a href="<?php the_permalink(); ?>">
                                            <img src="<?php echo hk_get_thumb(get_the_id(),330,165) ?>" alt="Img">
                                        </a>
                                        <?php
                                        $categories=get_the_category(get_the_id());
                                        $i=0;
                                        foreach ($categories as $c) {
                                        $category_link = get_category_link($c->cat_ID);
                                        if($i===0){
                                            echo '<span class="category-title position--absolute"><a href="'.$category_link.'">'.$c->cat_name.'</a></span>';
                                            }
                                        break;
                                        }
                                        ?>
                                    </div>
                                    <div class="content-last-item-title eclips">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </div>
                                    <div class="content-last-item-editor-date">
                                        <span class="editor"><?php the_author_link(); ?></span> -
                                        <span class="date-time"><?php echo get_the_date( 'F j, Y' ) ?></span>
                                        <span class="comment"><?php echo getPostViews(get_the_id()); ?></span>
                                    </div>
                                </div>
                            <?php
                        endwhile;
                      endwhile;
                    }?>
            </div>
            
        </div>
        <div class="nw__sidebar-2 col-divide-4 col-divide-md-12">
            <?php if (dynamic_sidebar('left-sidebar-2')) : get_sidebar( 'left-sidebar-2' ); ?><?php endif; ?>
            </div>
    </div>
</section>