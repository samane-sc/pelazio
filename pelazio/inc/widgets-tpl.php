<?php
// slider_Widget
class ws_banner_slider extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'ws_banner_slider', // Base ID
            'ابزارک بنر اسلاید' // Name
        );
    }
    public function widget($args, $instance)
    {
        ?>
        <a class="special-menu-item" href="<?php echo $instance['link'] ?>">
            <img src="<?php echo $instance['img'] ?>" alt="<?php echo $instance['title'] ?>" class="lazy">
        </a>
        <?php
    }
    public function form($instance)
    {
        $link = !empty($instance['link']) ? $instance['link'] : '';
        $img = !empty($instance['img']) ? $instance['img'] : '';
        $title = !empty($instance['title']) ? $instance['title'] : '';

        ?>
        <label for="<?php echo esc_attr($this->get_field_id('link')); ?>">لینک</label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('link')); ?>"
               name="<?php echo esc_attr($this->get_field_name('link')); ?>" type="text"
               value="<?php echo esc_attr($link); ?>">
        <label for="<?php echo esc_attr($this->get_field_id('img')); ?>">url تصویر</label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('img')); ?>"
               name="<?php echo esc_attr($this->get_field_name('img')); ?>" type="text"
               value="<?php echo esc_attr($img); ?>">
        <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">عنوان تصویر</label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
               name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
               value="<?php echo esc_attr($title); ?>">
        <?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['link'] = (!empty($new_instance['link'])) ? strip_tags($new_instance['link']) : '';
        $instance['img'] = (!empty($new_instance['img'])) ? strip_tags($new_instance['img']) : '';
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }
}
// brand_Widget
class ws_brand_slider extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'ws_brand_slider', // Base ID
            'ابزارک برند اسلاید' // Name
        );
    }
    public function widget($args, $instance)
    {
        ?>
        <div class="logo">
            <a href="<?php echo $instance['link'] ?>">
                <img src="<?php echo $instance['img'] ?>" alt="<?php echo $instance['title'] ?>" class="lazy" width="100px" height="100px">
            </a>
        </div>
        <?php
    }
    public function form($instance)
    {
        $link = !empty($instance['link']) ? $instance['link'] : '';
        $img = !empty($instance['img']) ? $instance['img'] : '';
        $title = !empty($instance['title']) ? $instance['title'] : '';
        ?>
        <label for="<?php echo esc_attr($this->get_field_id('link')); ?>">لینک</label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('link')); ?>"
               name="<?php echo esc_attr($this->get_field_name('link')); ?>" type="text"
               value="<?php echo esc_attr($link); ?>">
        <label for="<?php echo esc_attr($this->get_field_id('img')); ?>">url تصویر</label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('img')); ?>"
               name="<?php echo esc_attr($this->get_field_name('img')); ?>" type="text"
               value="<?php echo esc_attr($img); ?>">
        <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">عنوان تصویر</label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
               name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
               value="<?php echo esc_attr($title); ?>">
        <?php
    }
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['link'] = (!empty($new_instance['link'])) ? strip_tags($new_instance['link']) : '';
        $instance['img'] = (!empty($new_instance['img'])) ? strip_tags($new_instance['img']) : '';
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }
}
// box_Widget
class ws_banner_box extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'ws_banner_box', // Base ID
            'ابزارک بنر تبلیغاتی', // Name
            array('description' => __('سایز تصاویر: تمام عرض (200*1200)، نصف عرض (200*600)، 1/3 عرض (250*360)، 1/4 عرض (200*260)، 2/3 عرض (250*750).', 'text_domain'),) // Args
        );
    }
    public function widget($args, $instance)
    {
        ?>
        <div class="<?php echo $instance['size'] ?>">
            <a class="special-menu-item" href="<?php echo $instance['link'] ?>">
                <img width="670" height="402" src="<?php echo $instance['img'] ?>" alt="<?php echo $instance['title'] ?>">
            </a>
        </div>
        <?php
    }
    public function form($instance)
    {
        $link = !empty($instance['link']) ? $instance['link'] : '';
        $img = !empty($instance['img']) ? $instance['img'] : '';
        $title = !empty($instance['title']) ? $instance['title'] : '';
        $size = !empty($instance['size']) ? $instance['size'] : '';

        ?>
        <label for="<?php echo esc_attr($this->get_field_id('link')); ?>">لینک</label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('link')); ?>"
               name="<?php echo esc_attr($this->get_field_name('link')); ?>" type="text"
               value="<?php echo esc_attr($link); ?>">
        <label for="<?php echo esc_attr($this->get_field_id('img')); ?>">url تصویر</label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('img')); ?>"
               name="<?php echo esc_attr($this->get_field_name('img')); ?>" type="text"
               value="<?php echo esc_attr($img); ?>">
        <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">عنوان تصویر</label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
               name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
               value="<?php echo esc_attr($title); ?>">
        <select id="<?php echo esc_attr($this->get_field_id('size')); ?>"
                name="<?php echo esc_attr($this->get_field_name('size')); ?>">
            <option value="col-lg-3 col-md-6 col-sm-6 col-6" <?php if ($instance['size'] == 'col-lg-3 col-md-6 col-sm-6 col-6') {
                echo 'selected';
            } ?>>یک چهارم عرض
            </option>

            <option value="col-lg-4 col-12" <?php if ($instance['size'] == 'col-lg-4 col-12') {
                echo 'selected';
            } ?>>یک سوم عرض
            </option>
            <option value="col-md-6 col-sm-12 col-12" <?php if ($instance['size'] == 'col-lg-6 col-md-12') {
                echo 'selected';
            } ?>>نصف عرض
            </option>
            <option value="col-lg-8 col-md-8 col-sm-8 col-12" <?php if ($instance['size'] == 'col-lg-8 col-md-8 col-sm-8 col-xs-12') {
                echo 'selected';
            } ?>>دو سوم عرض
            </option>
            <option value="col-lg-12" <?php if ($instance['size'] == 'col-lg-12') {
                echo 'selected';
            } ?>>تمام عرض
            </option>
            <option value="" <?php if ($instance['size'] == '') {
                echo 'selected';
            } ?>>عرض تصویر
            </option>
        </select>
        <?php
    }
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['link'] = (!empty($new_instance['link'])) ? strip_tags($new_instance['link']) : '';
        $instance['img'] = (!empty($new_instance['img'])) ? strip_tags($new_instance['img']) : '';
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['size'] = (!empty($new_instance['size'])) ? strip_tags($new_instance['size']) : '';
        return $instance;
    }
}
// slidebar_post
class ws_slidebar_post extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'My_Widget',  // Base ID
            'پست اخیر'   // Name
        );
    }
    public $args = array(
        'before_title' => '<h4>',
        'after_title' => '</h4>',
        'before_widget' => '<div>',
        'after_widget' => '</div></div>'
    );
    public function widget($args, $instance)
    {
        echo $args['before_widget'];
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }
        $widget_post = new WP_Query(array(
            'post_per_page' => 3,
            'post_type' => 'post'
        ));
        if ($widget_post->have_posts()) {
            echo '<ul class="blog-post__posts">';
            while ($widget_post->have_posts()): $widget_post->the_post();
                echo '<li>   
                         <a class="blog-post__recent" href="' . get_the_permalink($widget_post->post->ID) . '">                         
                            ' . get_the_post_thumbnail($widget_post->post->ID) . '
                            <div>
                                <h5>' . get_the_title($widget_post->post->ID) . '</h5>
                                <span>' . get_the_date('Y/m/d') . '</span>
                            </div>
                         </a>
                        </li>';
            endwhile;
            echo '</ul>';
        }
        wp_reset_postdata();
        echo $args['after_widget'];
    }
    public function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : esc_html__('New Title', 'text_domain');
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php echo esc_html__('عنوان:', 'text_domain'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>">
        </p>
        <?php
    }
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }
}
//brand sidebar
class ws_banner_sidber extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'ws_banner_sidber', // Base ID
            'ابزارک برند سایدبار' // Name
        );
    }
    public $args = array(
        'before_title' => '<h6>',
        'after_title' => '</h6>',
        'before_widget' => '<div>',
        'after_widget' => '</div>'
    );
    public function widget($args, $instance)
    {
        echo $args['before_widget'];
        echo '<div class="product-sidebar_brands">';
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }
        $terms = get_terms( 'brand_tax', array(
            'hide_empty' => false,
            'parent' => 0
        ) );
        echo '<ul>';
            foreach($terms as $term) :
                echo '<li>   
                         <a href="' . get_term_link( $term->slug, $term->taxonomy ) . '">
                             <h5>' . $term->name . '</h5>
                         </a>
                      </li>';
            endforeach;
        echo '</ul>';
        echo '</div>';
        echo $args['after_widget'];
    }
    public function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : '';

        ?>
        <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">عنوان </label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
               name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
               value="<?php echo esc_attr($title); ?>">
        <?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }
}
add_action('widgets_init', 'widget_func');
function widget_func()
{
    register_widget('ws_banner_slider');
    register_widget('ws_brand_slider');
    register_widget('ws_banner_box');
    register_widget('ws_slidebar_post');
    register_widget('ws_banner_sidber');
}
