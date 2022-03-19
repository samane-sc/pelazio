<?php
function slider_lg()
{
    register_sidebar(array(
        'name' => 'اسلایدر ابتدای سایت در سایز لب تاب',
        'id' => 'slider_lg',
        'description' => "اسلایدر ابتدای سایت",
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="aside_h4">',
        'after_title' => '</h4>',
    ));
}
add_action('widgets_init', 'slider_lg');
function slider_sm()
{
    register_sidebar(array(
        'name' => 'اسلایدر ابتدای سایت در سایز موبایل',
        'id' => 'slider_sm',
        'description' => "اسلایدر ابتدای سایت",
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="aside_h4">',
        'after_title' => '</h4>',
    ));
}
add_action('widgets_init', 'slider_sm');
function first_banner()
{
    register_sidebar(array(
        'name' => 'اولین بنر تبلیغاتی',
        'id' => 'first_banner',
        'description' => "اولین بنر تبلیغاتی",
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="aside_h4">',
        'after_title' => '</h4>',
    ));
}
add_action('widgets_init', 'first_banner');
function second_banner()
{
    register_sidebar(array(
        'name' => 'دومین بنر تبلیغاتی',
        'id' => 'second_banner',
        'description' => "دومین بنر تبلیغاتی",
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="aside_h4">',
        'after_title' => '</h4>',
    ));
}
add_action('widgets_init', 'second_banner');
function third_banner()
{
    register_sidebar(array(
        'name' => 'سومین بنر تبلیغاتی',
        'id' => 'third_banner',
        'description' => "سومین بنر تبلیغاتی",
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="aside_h4">',
        'after_title' => '</h4>',
    ));
}
add_action('widgets_init', 'third_banner');
function brand_slider()
{
    register_sidebar(array(
        'name' => 'اسلایدر برندها',
        'id' => 'brand_slider',
        'description' => "اسلایذر برندها",
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="aside_h4">',
        'after_title' => '</h4>',
    ));
}
add_action('widgets_init', 'brand_slider');
function blog_sidebar()
{
    register_sidebar(array(
        'name' => 'اسلایدبار وبلاگ',
        'id' => 'sidebar-blog',
        'description' => "اس لایدبار برای وبلاگ",
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
}
add_action('widgets_init', 'blog_sidebar');
function shop_sidebar()
{
    register_sidebar(array(
        'name' => 'اسلایدبار فروشگاه',
        'id' => 'sidebar-shop',
        'description' => "اس لایدبار برای فروشگاه",
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
}
add_action('widgets_init', 'shop_sidebar');
