<?php 
class WolfActive_Slide_Post_Widget extends WP_Widget{
    public function __construct(){
        parent::__construct(
            'WolfActive_Slide_Post_Widget',
            esc_html__('Wolfactive Slide Post','base-theme'),
            array(
                'description' => esc_html__( 'Display Wolfactive Slide Post','base-theme')
            )
        );
    }
    public function form($instance){
        var_dump($instance);
        if(isset($instance['title'])){
            $title = $instance['title'];
        } else {
            $title = '';
        }
        if(isset($instance['post_count'])){
            $postCount = $instance['post_count'];
        } else {
            $postCount = 4;
        }
        if(isset($instance['cat_display'])){
            $cat_display = $instance['cat_display'];
        } else {
            $cat_display = '';
        }
        ?>

<div>
    <p><label for="<?php echo $this->get_field_id('title');?>"> <?php esc_html_e('Title:','base-theme')?></label></p>
    <input type="text" class="widefat" id="<?php echo $this->get_field_id('title')?>" name="<?php echo $this->get_field_name('title') ?>" value="<?php echo esc_attr($title); ?>" />
</div>
<p>
    <label for="<?php echo $this->get_field_id('post_count') ?>"><?php esc_html_e('Post Count') ?></label>
    <input type="number" class="tiny-text" id="<?php echo $this->get_field_id('post_count')?>" min="4" max="10" value="<?php echo intval($postCount); ?>" name="<?php echo $this->get_field_name('post_count') ?>"/>
</p>
<p>
    <label for="<?php echo $this->get_field_id('cat_display')?>"><?php esc_html_e('Category:','base-theme')?></label>
    <select id="<?php echo $this->get_field_id('cat_display')?>" name="<?php echo $this->get_field_name('cat_display')?>">
        <?php 
            $cats = get_terms('category');
            foreach($cats as $cat){
                $category_link = get_term_link( $cat );
                if($cat->name !== 'Uncategorized'){
                  ?>
                  <option <?php selected($cat_display,$cat->slug);?> value="<?php echo $cat->slug?>"><?php esc_html_e($cat->name); ?></option>
                  <?php
                }
              }
        ?>
    </select>
</p>

<?php
    }
    public function widget($args,$instance){
        echo $args['before_widget'];
        
        var_dump($instance['cat_display']);
        if(isset($instance['title']))
        {
            $title=apply_filters('widget_title',$instance['title']);
            echo $args['before_title'].esc_html($title).$args['after_title'];
        }
        $args = array(
            'category_name' => $instance['cat_display'],
            'order' => 'DESC',
            'showposts' => $instance['post_count'],
            'post_type' => 'post',
            'post_status' => 'publish',
          );
          $category_post = new WP_Query($args);
        ?>
        <div class="slidePost" data-flickity='{ "autoPlay": true, "pauseAutoPlayOnHover": false, "pageDots": false,"draggable": true}'>
        <?php
        while($category_post->have_posts()):$category_post->the_post();
        ?>
        <div class="slidePost__item">
            <div class="slidePost__item-title">
                <h2 class="title__block"> <a href="<?php the_permalink() ?>"><?php echo wp_trim_words(get_the_title(),15,'...'); ?></a> </h2>
            </div>
            <div class="slidePost__item-author slidePost__item-date slidePost__item-views">
                <div class="author date">
                <span class="author-name"><?php the_author_link(); ?></span>
                -
                <span class="date-time"><?php echo get_the_date( 'F j, Y' ); ?></span>
                <span class="views-count"><?php echo getPostViews(get_the_id()); ?></span>
                </div>
            </div>
            <div class="slidePost__item-thumbnail">
                <div class="thumbnail-image">
                <a href="<?php the_permalink() ?>"> <img src="<?php echo hk_get_thumb(get_the_id(),324,162) ?>" alt="image"> </a>
                <div class="category-post">
                    <?php
                    $categories=get_the_category(get_the_id());
                    $i=0;
                    foreach ($categories as $c) {
                        $category_link = get_category_link($c->cat_ID);
                        if($i===0){
                        echo '<span class="category-title"><a href="'.$category_link.'">'.$c->cat_name.'</a></span>';}
                        $i++;
                    } ?>
                </div>
                </div>
            </div>
            <div class="slidePost__item-excerpt open-sanrif">
                <?php echo wp_trim_words( get_the_content(), 20, '...' ); ?>
            </div>
        </div>
        <?php
        endwhile;
        ?>
        </div>
    </div>
<?php
        echo $args['after_widget'];
    }
    public function update($new_instance, $old_instance){
        $instance = array();
        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['post_count'] = intval($new_instance['post_count']);
        $instance['cat_display'] = $new_instance['cat_display'];
        return $instance;
    }
}
    function wolfactive_slide_post_widget(){
        register_widget('WolfActive_Slide_Post_Widget');
    }
    add_action('widgets_init','wolfactive_slide_post_widget');