<?php 
class Category_Popular_Widget extends WP_Widget{
    public function __construct(){
        parent::__construct(
            'category_popular_widget',
            esc_html__('Wolfactive Popular Category','base-theme'),
            array(
                'description' => esc_html__( 'Display Wolfactive Popular Category','base-theme')
            )
        );
    }
    public function form($instance){
        if(isset($instance['title'])){
            $title = $instance['title'];
        } else {
            $title = '';
        }

        ?>

<div>
    <p><label for="<?php echo $this->get_field_id('title');?>"> <?php esc_html_e('Title:','base-theme')?></label></p>
    <input type="text" class="widefat" id="<?php echo $this->get_field_id('title')?>"
        name="<?php echo $this->get_field_name('title') ?>" value="<?php echo esc_attr($title); ?>" />
</div>
<?php
    }
    public function widget($args,$instance){
        echo $args['before_widget'];
        if(isset($instance['title']))
        {
            $title=apply_filters('widget_title',$instance['title']);
            echo $args['before_title'].esc_html($title).$args['after_title'];
        }
        $categories = get_categories( array(
            'orderby' => 'count',
            'order'   => 'DESC',
        ) );
        foreach($categories as $cat){
            $category_link = get_term_link( $cat );
            if($cat->name !== 'Uncategorized'){
              echo '<li class="category-item my-10"><span><a class="roboto category-name" href="'.$category_link.'">'.$cat->name.'</a></span> <span class="cat-counts-post">'.$cat->count.'<span> </li>';
            }
          }
        echo $args['after_widget'];
    }
    public function update($new_instance, $old_instance){
        $instance = array();
        $instance['title'] = sanitize_text_field($new_instance['title']);
        return $instance;
    }
}
function wolfactive_most_popular_category_widget(){
    register_widget('Category_Popular_Widget');
}
add_action('widgets_init','wolfactive_most_popular_category_widget');