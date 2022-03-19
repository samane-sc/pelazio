<?php
if (!defined('ROOT_DIR')) {
    define('ROOT_DIR', get_template_directory());
}
if (!defined('ROOT_URI')) {
    define('ROOT_URI', get_template_directory_uri());
}
define('VER', "14.4");
$options = get_option('data_options');
add_filter('show_admin_bar', '__return_false');
add_theme_support("title-tag");
add_theme_support("post-thumbnails");
add_theme_support("woocommerce");
//menu
add_action('after_setup_theme', 'menu_setup');
function menu_setup()
{
    add_theme_support('menus');
    register_nav_menus(array(
        'top-menu-one' => "a menu for top one",
        'footer-menu-sm' => "a menu for small screen fixed in the bottom of the site",
        'footer-menu-one' => "a menu for footer one",
        'footer-menu-two' => "a menu for footer two",
        'footer-menu-three' => "a menu for footer three",
        'footer-menu-four' => "a menu for footer four",
    ));
    add_theme_support('post-thumbnails');
}

//js
add_action('wp_enqueue_scripts', 'add_script');
function add_script()
{
    // owl
    wp_register_script('owl.script', get_template_directory_uri() . '/assets/js/owl/owl.carousel.min.js',
        array('jquery'), VER, true);
    wp_enqueue_script('owl.script');
    //index
    wp_register_script('mk_main_js', get_template_directory_uri() . '/assets/js/main.js',
        array('jquery'), VER, true);
    wp_enqueue_script('mk_main_js');
    //js for login
    if (!is_user_logged_in()) {
        wp_enqueue_script('login', get_template_directory_uri() . '/assets/js/login.js',
        array('jquery'), VER, true);
    }
    //js for ajax
    wp_register_script('mk_ajax.js', get_template_directory_uri() . '/assets/js/ajax.js',
        array('jquery'), VER, true);
    wp_enqueue_script('mk_ajax.js');
    // add variable for ajax data
    wp_localize_script('mk_ajax.js', 'data', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'redirecturl' => home_url()
    ));
    //add bootstrap
    wp_register_script('mk_bootstrap_min_js', get_template_directory_uri() . '/assets/js/bootstrap/bootstrap.min.js',
        null, VER, true);
    wp_enqueue_script('mk_bootstrap_min_js');
    //light galley
    if (is_product()) {
        wp_enqueue_script('lightgallery', 'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.14/js/lightgallery-all.min.js', array('jquery'), VER, true);
        wp_enqueue_script('product', get_template_directory_uri() . '/assets/js/product.js', array('jquery', 'owl.script', 'lightgallery'), VER, true);
    }
}

//css
add_action('wp_enqueue_scripts', 'add_styles', 99);
function add_styles()
{
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap/bootstrap.min.css', '', VER);
    wp_enqueue_style('bootstrap_rtl', get_template_directory_uri() . '/assets/css/bootstrap/bootstrap-rtl.css', '', VER);
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/css/bootstrap/all.css', '', VER);
    wp_enqueue_style('owl_carousel', get_template_directory_uri() . '/assets/css/owl/owl.carousel.min.css', '', VER);
    wp_enqueue_style('owl_theme', get_template_directory_uri() . '/assets/css/owl/owl.theme.default.min.css', '', VER);
    wp_enqueue_style('normalize', get_template_directory_uri() . '/assets/css/normalize.css', '', VER);
    if (is_product()) {
        wp_enqueue_style('lightgallery', 'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.14/css/lightgallery.min.css', '', VER);
    }
    wp_enqueue_style('main_style', get_stylesheet_uri(), '', VER);
}

//admin js,css
add_action('admin_enqueue_scripts', 'mk_register_style');
function mk_register_style()
{
    wp_enqueue_style('mk_admin_style', get_template_directory_uri() . '/admin/css/admin.css', '', VER);
    wp_enqueue_script('mk_admin_js', get_template_directory_uri() . '/admin/js/admin.js', array('jquery'), VER, true);
}

//register
add_action('init', 'my_theme_create_new_user');
function my_theme_create_new_user()
{
    if (isset($_POST['user_registeration'])) {
        $username = sanitize_user($_POST['username']);
        $useremail = sanitize_email($_POST['user_email']);
        $password = esc_attr($_POST['password']);

        $user_id = username_exists($username);
        if (!$user_id && email_exists($useremail) == false) {
            $user_id = wp_create_user($username, $password, $useremail);
            if (!is_wp_error($user_id)) {
                $user = get_user_by('id', $user_id);
                $user->set_role('administrator');

                $userdata = array(
                    'user_login' => $username,
                    'user_email' => $useremail,
                    'user_pass' => $password,
                );
                wp_insert_user($userdata);
            }
            ?>
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <div class="modal-header">
                        <span class="close">&times;</span>
                        <h2>به سایت ما خوش امدید.</h2>
                    </div>
                    <div class="modal-body">
                        <p>ثبت نام با موفقیت انجام شد.</p>
                    </div>
                </div>
            </div>
            <?php
        } else {
            ?>
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <div class="modal-header">
                        <span class="close">&times;</span>
                        <h2>خطایی رخ داده است</h2>
                    </div>
                    <div class="modal-body">
                        <p>نام کاربری یا ایمیل تکراریست.</p>
                        <p>شما قبلا در سایت عضو شده اید.</p>
                    </div>
                </div>
            </div>
            <?php
        }
//        //send email to new user and admin
//        $user = get_user_by( 'email', $useremail );
//        wp_new_user_notification( $user->ID, null, 'both');
    }
}
////wrong info
//add_filter('login_redirect', 'my_login_redirect', 10, 3);
//function my_login_redirect($redirect_to, $requested_redirect_to, $user) {
//    if (is_wp_error($user)) {
//        $error_types = array_keys($user->errors);
//        $error_type = 'both_empty';
//        if (is_array($error_types) && !empty($error_types)) {
//            $error_type = $error_types[0];
//        }
//        wp_redirect( get_permalink( 93 ) . "?login=failed&reason=" . $error_type );
//        exit;
//    } else {
//        return home_url();
//    }
//}

////login redirect
//add_filter('login_redirect', 'user_default_page');
//add_filter('registration_redirect', 'user_default_page');
//function user_default_page()
//{
//    $account_url = get_permalink(get_option('woocommerce_myaccount_page_id'));
//    return $account_url;
//}

//auto login
add_action('user_register', 'auto_login_new_user');
function auto_login_new_user($user_id)
{
    wp_set_current_user($user_id);
    wp_set_auth_cookie($user_id);
//    exit();

}

//post view
function get_post_view($post_id)
{
    if (intval($post_id)) {
        $post_view = get_post_meta($post_id, 'views', true);
        return intval($post_view);
    }
    return 0;
}

function set_post_view($post_id)
{
    if (intval($post_id)) {
        $view = get_post_view($post_id);
        $view++;
        update_post_meta($post_id, 'views', $view);
    }
}

//calculate percentage
function ws_calculate_percentages($price, $discount)
{
    return number_format(($discount * 100) / $price);
}

// discount
function ws_calculate_discount($price, $salePrice)
{
    return $discount = $price - $salePrice;
}

//price
function ws_get_price($product)
{
    $result = '';
    if ($product->is_on_sale()) {
        if ($product->is_type('simple')) {
            if ($product->is_on_sale()) {
                $price = $product->get_regular_price();
                $sale_price = $product->get_sale_price();
                $discount = ws_calculate_discount($price, $sale_price);
                $salePrice = ws_calculate_percentages($price, $discount);
                $result .= '<div class="product__price-sale">';
                $result .= ' <b>%</b>' . $salePrice . '</div>';
            }
        } else if ($product->product_type == 'variable') {
            $available_variations = $product->get_available_variations();
            $vari_count = count($available_variations);
            $min_sale_price_pro = null;
            $min_sale_price = null;
            for ($i = 0; $i < $vari_count; $i++) {
                $variation_id = $available_variations[$i]['variation_id']; // Getting the variable id of just the 1st product. You can loop $available_variations to get info about each variation.
                $variable_product1 = new WC_Product_Variation($variation_id);
                if ($min_sale_price == null || $min_sale_price > $variable_product1->sale_price && $variable_product1->sale_price > 0) {
                    $min_sale_price = $variable_product1->sale_price;
                    $min_sale_price_pro = $variable_product1;
                }
            }

            $price = $min_sale_price_pro->regular_price;
            $discount = ws_calculate_discount($price, $min_sale_price);
            $salePrice = ws_calculate_percentages($price, $discount);
            if ($discount > 0) {
                $result .= '<div class="product__price-sale">';
                $result .= ' <b>%</b>' . $salePrice . '</div>';
            }
        }
    }
    return $result;
}

//change woocommerce checkout form
add_filter('woocommerce_checkout_fields', 'WooCommerce_EDD_Checkout', 99);
function WooCommerce_EDD_Checkout($fields)
{
    global $woocommerce;
    $hasPhysicalProduct = false;
    if (!empty($woocommerce->cart->cart_contents)) {
        $cart = $woocommerce->cart->get_cart();
        foreach ($cart as $key => $values) {
            $_product = get_product($values['variation_id'] ? $values['variation_id'] : $values['product_id']);
            if (!empty($_product) && $_product->exists() && $values['quantity'] > 0) {
                if ($_product->virtual == 'no' && $_product->downloadable == 'no') {
                    $hasPhysicalProduct = true;
                    break;
                }
            }
        }
    }
    unset($fields['shipping']['shipping_company']);
    unset($fields['shipping']['shipping_address_2']);
    unset($fields['shipping']['shipping_country']);
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_country']);
    $fields['billing']['billing_address_1']['label'] = "آدرس";
    $fields['shipping']['shipping_address_1']['label'] = "آدرس";
    $fields['billing']['billing_phone']['label'] = "شماره همراه";
    $fields['billing']['billing_email']['required'] = false;
    $fields['billing']['billing_postcode']['label'] = "کدپستی";
    $fields['billing']['billing_postcode']['required'] = false;
    $fields['shipping']['shipping_postcode']['label'] = "کدپستی";
    $fields['shipping']['shipping_postcode']['required'] = false;
    if ($hasPhysicalProduct == false) {
        unset($fields['billing']['billing_address_1']);
    }
    return $fields;
}

//delete products with no price
add_action('woocommerce_product_query', 'react2wp_hide_products_without_price');
function react2wp_hide_products_without_price($q)
{
    $meta_query = $q->get('meta_query');
    $meta_query[] = array(
        'key' => '_price',
        'value' => '',
        'compare' => '!='
    );
    $q->set('meta_query', $meta_query);
}

//delete product with 0 price
add_action('woocommerce_product_query', 'react2wp_hide_products_higher_than_zero');
function react2wp_hide_products_higher_than_zero($q)
{
    $meta_query = $q->get('meta_query');
    $meta_query[] = array(
        'key' => '_price',
        'value' => 0,
        'compare' => '>'
    );
    $q->set('meta_query', $meta_query);
}

//remove hook woocommerce_result_count
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
//delete description tab
add_filter('woocommerce_product_tabs', 'remove_product_tabs', 9999);
function remove_product_tabs($tabs)
{
    unset($tabs['description']);
    return $tabs;
}

//pagination shop
add_filter('loop_shop_per_page', 'products_per_page');
function products_per_page()
{
    return 8;
}
/* =====================================
                optimize
===================================== */
//remove yoast structure
add_filter('wpseo_json_ld_output', '__return_false');

//remove emoji
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

// Remove WP embed script
add_action('init', 'speed_stop_loading_wp_embed');
function speed_stop_loading_wp_embed()
{
    if (!is_admin()) {
        wp_deregister_script('wp-embed');
    }
}

add_action('wp_print_styles', 'wps_deregister_styles', 100);
function wps_deregister_styles()
{
    wp_dequeue_style('wp-block-library');
}

// Defer Javascripts Speed up loading for external js
if (!is_admin()) {
    function defer_parsing_of_js($url)
    {
        if (FALSE === strpos($url, '.js')) return $url;
        if (strpos($url, 'jquery.min.js')) return $url;
        return "$url' defer='defer";
    }
    add_filter('clean_url', 'defer_parsing_of_js', 11, 1);
}

add_filter('the_content', 'add_alt_tags', 99);
function add_alt_tags($content)
{
    global $post;
    if (is_single()) {
        $tags = get_the_tags($post->ID);
        preg_match_all('/<img (.*?)\/>/', $content, $images);
        if (!is_null($images)) {
            $j = 0;
            foreach ($images[1] as $index => $value) {
                $alt_ = [];
                $alt = '';
                if ($tags) {
                    $count_tags = count($tags);
                    if ($count_tags > 0) {

                        for ($a = 0; $a < 3; $a++) {
                            if ($j >= $count_tags) {
                                $j = 0;
                            }

                            $alt_[] = $tags[$j]->name;
                            $j++;
                        }
                        $alt = implode(",", $alt_);
                    }

                } else {
                    $alt = $post->post_title;
                }
                $new_img = str_replace('<img', '<a target = "_blank" href = "' . get_the_permalink() . '"><img alt="' . $alt . '" title="' . $post->post_title . '"', $images[0][$index]);
                $new_img = str_replace('/>', '/></a>', $new_img);

                $content = str_replace($images[0][$index], $new_img, $content);
            }
        }
    }
    return $content;
}

add_action('wp_head', 'wt_meta_keyword');
function wt_meta_keyword()
{
    global $post;
    if (is_single()) {
        if (has_tag()) {
            $tags = get_the_tags($post->ID);
            $tag_post = "";
            foreach ($tags as $tag) {
                $tag_post .= $tag->name . ',';
            }
            echo '<meta name="keyword" content="' . $tag_post . '" />' . "\n";
        }
    }

}

add_filter("wpseo_robots", function ($robots) {
    if (is_paged()) {
        return 'noindex,follow';
    } else {
        return $robots;
    }
});

/* =====================================
                includes
===================================== */
include get_template_directory() . '/admin/admin.php';
include get_template_directory() . '/inc/widgets.php';
include get_template_directory() . '/inc/widgets-tpl.php';
include get_template_directory() . '/inc/customize.php';
include get_template_directory() . '/inc/shortcodes.php';
include get_template_directory() . '/inc/contact-DB.php';
include get_template_directory() . '/link-optimize.php';