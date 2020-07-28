<?php 

function WolfactiveOrderSort($input){
    $value = array('date','rand');
    if(in_array($input, $value,true)){
        return $input;
    } return 'date';
}
class Most_Popular_Post_Widget extends WP_Widget{
    public function __construct(){
        parent::__construct(
            'most_popular_widget',
            esc_html__('Wolfactive Popular Post','base-theme'),
            array(
                'description' => esc_html__( 'Display Wolfactive Popular Post','base-theme')
            )
        );
    }
    public function form($instance){
        if(isset($instance['title'])){
            $title = $instance['title'];
        } else {
            $title = '';
        }
        if(isset($instance['post_count'])){
            $postCount = $instance['post_count'];
        } else {
            $postCount = 1;
        }
        if(isset($instance['include_date'])){
            $showDate = $instance['include_date'];
        } else {
            $showDate = false;
        }
        if(isset($instance['sort_by'])){
            $sort_by = $instance['sort_by'];
        } else {
            $sort_by = 'date';
        }
        ?>

<div>
    <p><label for="<?php echo $this->get_field_id('title');?>"> <?php esc_html_e('Title:','base-theme')?></label></p>
    <input type="text" class="widefat" id="<?php echo $this->get_field_id('title')?>" name="<?php echo $this->get_field_name('title') ?>" value="<?php echo esc_attr($title); ?>" />
</div>
<p>
    <label for="<?php echo $this->get_field_id('post_count') ?>"><?php esc_html_e('Post Count') ?></label>
    <input type="number" class="tiny-text" id="<?php echo $this->get_field_id('post_count')?>" min="1" max="5" value="<?php echo intval($postCount); ?>" name="<?php echo $this->get_field_name('post_count') ?>"/>
</p>
<p>
    <label for="<?php echo $this->get_field_id('include_date')?>"><?php esc_html_e('Show Date','base-theme')?></label>
    <input name="<?php echo $this->get_field_name('include_date') ?>" <?php checked($showDate)?> type="checkbox" class="wolfactive__widget-input" id="<?php echo $this->get_field_id('include_date')?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('sort_by')?>"><?php esc_html_e('Sort By:','base-theme')?></label>
    <select id="<?php echo $this->get_field_id('sort_by')?>" name="<?php echo $this->get_field_name('sort_by')?>">
        <option <?php selected($sort_by,'date');?> value="date"><?php esc_html_e('Most Recent'); ?></option>
        <option <?php selected($sort_by,'rand');?> value="rand"><?php esc_html_e('Random'); ?></option>
    </select>
</p>

<?php
    }
    public function widget($args,$instance){
        echo $args['before_widget'];
        if(isset($instance['title']))
        {
            $title=apply_filters('widget_title',$instance['title']);
            echo $args['before-title'].esc_html($title).$args['after-title'];
        }
        $most_popular = array(
            'showposts' => $instance['post_count'],
            'meta_key' => 'post_views_count',
            'orderby' => $instance['sort_by'],
            'post_type' => 'post',
            'post_status' => 'publish',
        );
        $popular_post_query = new WP_Query($most_popular);
        ?>
        <div class="popular__post">
    <div class="popular__post-container">
  <?php
  while ($popular_post_query->have_posts()):$popular_post_query->the_post();
  $views = getPostViews(get_the_id());
    ?>
    <div class="popupar__post-item">
      <div class="nw__post-item row-divide">
        <div class="nw__image col-divide-4">
          <a href="<?php echo get_permalink(); ?>"><img src="<?php echo hk_get_thumb(get_the_id(),485,360) ?>" alt="Image"></a>
        </div>
        <div class="nw__infomation col-divide-8">
          <div class="nw__post-title nw__post-title--small">
            <a href="<?php echo get_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 10, '...' );?></a>
          </div>
          <?php if($instance['include_date']){ ?>
          <div class="nw__editor-date open-sanrif">
            <span class="date-time open-sanrif"><?php echo get_the_date( 'F j, Y' ) ?></span>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
    <?php
  endwhile;
  ?></div>
</div>
<?php
        echo $args['after_widget'];
    }
    public function update($new_instance, $old_instance){
        $instance = array();
        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['post_count'] = intval($new_instance['post_count']);
        $instance['include_date'] = boolval($new_instance['include_date']);
        $instance['sort_by'] = WolfactiveOrderSort($new_instance['sort_by']);
        return $instance;
    }
}
    function _wolfactive_most_popular_post_widget(){
        register_widget('Most_Popular_Post_Widget');
    }
    add_action('widgets_init','_wolfactive_most_popular_post_widget');