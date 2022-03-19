<?php
add_action( 'admin_menu', 'add_admin_menus' );
function add_admin_menus() {
    $admin_setting_hook = add_menu_page('تنظیمات قالب', 'تنظیمات قالب', 'read',
        'admin-setting', 'admin_setting_option' , 'dashicons-admin-generic', 60);

    add_action("load-{$admin_setting_hook}", 'admin_setting_callback');
}
function admin_setting_callback(){
    wp_enqueue_media();
}

//admin style register
add_action('admin_enqueue_scripts', 'add_admin_assets');
function add_admin_assets()
{
    wp_enqueue_style('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css' );
    wp_enqueue_script('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js', array('jquery') );
}

function admin_setting_option(){

    $options = get_option('data_options');
    $contacts = array();
    $list = array('general', 'banner', 'footer', 'products', 'productsoption');
    $default_tab = isset($_GET['tab']) && in_array($_GET['tab'], $list) ? $_GET['tab'] : 'general';
    if (isset($_POST['admin_submit'])){
        switch ($default_tab){
            case 'general':
                $options['general']['logo'] = sanitize_text_field($_POST['logo']);
                $options['general']['favicon'] = sanitize_text_field($_POST['favicon']);
                $options['general']['alt_logo'] = sanitize_text_field($_POST['alt_logo']);
                break;
            case 'banner':
                $options['banner']['img'] = sanitize_text_field($_POST['img']);
                $options['banner']['link_img'] = sanitize_text_field($_POST['link_img']);
                $options['banner']['alt_img'] = sanitize_text_field($_POST['alt_img']);
                break;
            case 'footer':
                $options['setting']['title'] = sanitize_text_field($_POST['title']);
                $options['setting']['title1'] = sanitize_text_field($_POST['title1']);
                $options['setting']['content'] = wp_unslash($_POST['content']);
                $options['setting']['copy_right'] = sanitize_text_field($_POST['copy_right']);
                $options['setting']['trust_assign'] = wp_unslash($_POST['trust_assign']);
                $options['setting']['saramad_assign'] = wp_unslash($_POST['saramad_assign']);
                $title = ($_POST['name']);
                $address = ($_POST['address']);
                $icon = ($_POST['icon']);
                for ($i = 0; $i < count($title); $i++) {
                    $contact = array(
                        'name' => $title[$i],
                        'address' => $address[$i],
                        'icon' => $icon[$i]
                    );
                    array_push($contacts, $contact);
                }
                $options['setting']['contacts'] = $contacts;
                $options['setting']['instagram'] = sanitize_text_field($_POST['instagram']);
                $options['setting']['telegram'] = sanitize_text_field($_POST['telegram']);
                $options['setting']['whatsapp'] = sanitize_text_field($_POST['whatsapp']);
                break;
            case 'products':
                $options['product']['ws_select2_most_popular_products'] = ($_POST['ws_select2_most_popular_products']);
                $options['product']['img1'] = sanitize_text_field($_POST['img1']);
                $options['product']['link1_img'] = sanitize_text_field($_POST['link1_img']);
                $options['product']['onsale_url'] = sanitize_text_field($_POST['onsale_url']);
                isset($_POST['exist1'])? $options['product']['exist1'] = 1 : $options['product']['exist1'] = 0;
                $options['product']['ws_select2_best_products'] = ($_POST['ws_select2_best_products']);
                $options['product']['img2'] = sanitize_text_field($_POST['img2']);
                $options['product']['link2_img'] = sanitize_text_field($_POST['link2_img']);
                isset($_POST['exist2'])? $options['product']['exist2'] = 1 : $options['product']['exist2'] = 0;
                $options['product']['ws_select2_speed_sending_products'] = ($_POST['ws_select2_speed_sending_products']);
                $options['product']['img3'] = sanitize_text_field($_POST['img3']);
                $options['product']['link3_img'] = sanitize_text_field($_POST['link3_img']);
                isset($_POST['exist3'])? $options['product']['exist3'] = 1 : $options['product']['exist3'] = 0;
                $options['product']['ws_select2_just_our_products'] = ($_POST['ws_select2_just_our_products']);
                $options['product']['img6'] = sanitize_text_field($_POST['img6']);
                $options['product']['link6_img'] = sanitize_text_field($_POST['link6_img']);
                isset($_POST['exist4'])? $options['product']['exist4'] = 1 : $options['product']['exist4'] = 0;
                $options['product']['img7'] = sanitize_text_field($_POST['img7']);
                $options['product']['link7_img'] = sanitize_text_field($_POST['link7_img']);
                isset($_POST['exist5'])? $options['product']['exist5'] = 1 : $options['product']['exist5'] = 0;
                $options['product']['img4'] = sanitize_text_field($_POST['img4']);
                $options['product']['link4_img'] = sanitize_text_field($_POST['link4_img']);
                isset($_POST['exist6'])? $options['product']['exist6'] = 1 : $options['product']['exist6'] = 0;
                $options['product']['img5'] = sanitize_text_field($_POST['img5']);
                $options['product']['link5_img'] = sanitize_text_field($_POST['link5_img']);
                isset($_POST['exist7'])? $options['product']['exist7'] = 1 : $options['product']['exist7'] = 0;
                $options['product']['img8'] = sanitize_text_field($_POST['img8']);
                break;
            case 'productsoption':
                $options['productsetting']['title1'] = sanitize_text_field($_POST['title1']);
                $options['productsetting']['content1'] =  wp_unslash($_POST['content1']);
                $options['productsetting']['title2'] = sanitize_text_field($_POST['title2']);
                $options['productsetting']['content2'] =  wp_unslash($_POST['content2']);
                $options['productsetting']['title3'] = sanitize_text_field($_POST['title3']);
                $options['productsetting']['content3'] =  wp_unslash($_POST['content3']);
                break;
        }
    }
    update_option('data_options', $options);
    include get_template_directory().'/admin/admin-tpl.php';
}

add_action( 'wp_ajax_mishagetposts', 'rudr_get_posts_ajax_callback' ); // wp_ajax_{action}
function rudr_get_posts_ajax_callback(){

    // we will pass post IDs and titles to this array
    $return = array();

    // you can use WP_Query, query_posts() or get_posts() here - it doesn't matter
    $search_results = new WP_Query( array(
        's'=> $_GET['q'], // the search query
        'post_type' => 'product',
        'post_status' => 'publish', // if you don't want drafts to be returned
        'ignore_sticky_posts' => 1,
        'posts_per_page' => 50 // how much to show at once
    ) );
    if( $search_results->have_posts() ) :
        while( $search_results->have_posts() ) : $search_results->the_post();
            // shorten the title a little
            $title = $search_results->post->post_title;
            $return[] = array( $search_results->post->ID, $title ); // array( Post ID, Post Title )
        endwhile;
    endif;
    echo json_encode( $return );
    die;
}