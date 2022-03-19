<?php
//custom taxonomies
add_action('init', 'brand_taxonomy', 0);
function brand_taxonomy()
{
    $labels = array(
        'name' => _x('برندها', 'taxonomy general name'),
        'singular_name' => _x('برند', 'taxonomy singular name'),
        'search_items' => __('جستجوی برندها '),
        'all_items' => __('تمامی برندها'),
        'parent_item' => __('دسته برند مادر'),
        'parent_item_colon' => __('برند مادر:'),
        'edit_item' => __('ویرایش برند'),
        'update_item' => __('اپدیت برند'),
        'add_new_item' => __('اضافه کردن برند جدید'),
        'new_item_name' => __('نام برند جدید'),
        'menu_name' => __('برندها'),
        'choose_from_most_used' => 'انتخاب از بین پرطرفدارها',
    );
    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'brand_tax'),
    );
    register_taxonomy('brand_tax', 'product', $args);
}
// meta boxes
add_action('add_meta_boxes', 'guarantee_meta_box');
add_action('save_post', 'guarantee_meta_save');
function guarantee_meta_box()
{
    add_meta_box('guarantee_box', 'نام گارانتی محصول', 'guarantee_meta_box_content', 'product');
}
function guarantee_meta_box_content($post)
{
    $post_id = get_post_meta($post->ID, 'guarantee_text', true);
    ?>
    <input type="text" name="guarantee_input" style="width: 100%; height: 30px" value="<?php echo $post_id; ?>">
    <?php
}
function guarantee_meta_save($post_id)
{
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (isset($_POST['guarantee_input'])) {
        $input = sanitize_text_field($_POST['guarantee_input']);
        update_post_meta($post_id, 'guarantee_text', $input);
    }
}
//meta box
add_action('add_meta_boxes', 'send_meta_box');
add_action('save_post', 'send_meta_save');
function send_meta_box()
{
    add_meta_box('send_box', 'زمان تحویل محصول (برای مثال 23 روز)', 'send_meta_box_content', 'product');
}
function send_meta_box_content($post)
{
    $post_id = get_post_meta($post->ID, 'send_text', true);
    ?>
    <input type="text" name="send_input" style="width: 100%; height: 30px" value="<?php echo $post_id; ?>">
    <?php
}
function send_meta_save($post_id)
{
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (isset($_POST['send_input'])) {
        $input = sanitize_text_field($_POST['send_input']);
        update_post_meta($post_id, 'send_text', $input);
    }
}
//checkbox meta
add_action('add_meta_boxes', 'fake_meta_box');
add_action('save_post', 'fake_meta_save');
function fake_meta_box()
{
    add_meta_box('fake_box', 'نمایش برچسب اصل بودن محصول', 'fake_meta_box_content', 'product');
}
function fake_meta_box_content($post)
{
    ?>
    <?php $post_id = get_post_meta($post->ID, 'fake_product', true);?>
    <input id="fake_product" name="fake_product" type="checkbox"
    <?php checked(1, get_post_meta($post->ID, 'fake_product', true)); ?>">
    <?php
}
function fake_meta_save($post_id)
{
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (isset($_POST['fake_product'])) {
        update_post_meta($post_id, 'fake_product', 1);
    }
    else{
        update_post_meta($post_id, 'fake_product', 0);
    }
}
