<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;
global $options;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
    echo get_the_password_form(); // WPCS: XSS ok.
    return;
}
?>

<section class="product-container">
    <div class="row product-container__inside">
        <div class="col-xl-4 col-lg-6 col-md-12">
            <div class="product-gallery">
                <div class="product-thumbnail">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
                        <div class="carousel-inner clearfix" role="listbox">
                            <div class="carousel-item active" data-width="600"
                                 data-src="<?php echo get_the_post_thumbnail_url(); ?>">
                                <?php
                                echo get_the_post_thumbnail($product->get_id(), array(600, 600), array("class" => "img-responsive lazy center-block", "alt" => get_the_title()));
                                ?>
                            </div>
                            <?php
                            $attachment_ids = $product->get_gallery_image_ids();
                            if ($attachment_ids) {
                                foreach ($attachment_ids as $attachment_id) { ?>
                                    <div class="carousel-item" data-width="600"
                                         data-src="<?php echo wp_get_attachment_image_url($attachment_id, array(600, 600)); ?>">
                                        <?php
                                        echo wp_get_attachment_image($attachment_id, array(600, 600), "", array("class" => "img-responsive lazy center-block", "alt" => get_the_title()));
                                        ?>
                                    </div>
                                <?php }
                            } ?>
                        </div>
                        <ol class="carousel-indicators show-xs owl-carousel" id="sync">
                            <li data-target="#myCarousel" class="item active" data-slide-to="0">
                                <?php
                                echo get_the_post_thumbnail($product->get_id(), array(100, 100));
                                ?>
                            </li>
                            <?php
                            if ($attachment_ids) {
                                $c = 1;
                                foreach ($attachment_ids as $attachment_id) { ?>
                                    <li data-target="#myCarousel" class="item" data-slide-to="<?php echo $c++; ?>">
                                        <?php
                                        echo wp_get_attachment_image($attachment_id, array(100, 100));
                                        ?>
                                    </li>
                                <?php }
                            } ?>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-12 product-container__info">
            <?php the_title('<h1>', '</h1>'); ?>
            <?php $send = get_post_meta(get_the_ID(), 'fake_product', true); ?>
            <?php if ($send == '1'): ?>
                <div class="row product-container__info1">
                    <span class="product-fake">اصل</span>
                </div>
            <?php else: ?>
                <div class="row product-container__info1">
                    <span class="product-fake">متفرقه</span>
                </div>
            <?php endif; ?>
            <div class="product__price">
                <?php
                if ($product->get_price() != null) {
                    if ($product->is_type('simple') && $product->get_stock_quantity() > 0) {
                        $price = $product->get_regular_price();
                        if ($product->get_sale_price() != null) {
                            $sale_price = $product->get_sale_price();
                            $discount = ws_calculate_discount($price, $sale_price);
                            echo $discount;
                            ?>
                            <div class="discount">
                                <?php
                                if ($discount <= 999) {
                                    $dis_num = number_format($discount);
                                    $dis_text = "تومان تخفیف";
                                } else if ($discount > 999 & $discount <= 999999) {
                                    $dis_num = number_format($discount / 1000);
                                    $dis_text = "هزار تومان تخفیف";
                                } else if ($discount > 999999) {
                                    $dis_num = number_format($discount / 1000000);
                                    $dis_text = "میلیون تومان تخفیف";
                                } ?>
                                <span><b><?php echo $dis_num ?></b><?php echo $dis_text ?></span>
                            </div>
                            <?php
                        }
                    } else if ($product->is_type('variable') && $product->get_stock_quantity() > 0) {
                        $available_variations = $product->get_available_variations();
                        $vari_count = count($available_variations);
                        $total_price = 0;
                        $total_sale_price = 0;
                        for ($i = 0; $i < $vari_count; $i++) {
                            $variation_id = $available_variations[$i]['variation_id']; // Getting the variable id of just the 1st product. You can loop $available_variations to get info about each variation.
                            $variable_product1 = new WC_Product_Variation($variation_id);
                            $total_price += $variable_product1->regular_price;
                            if ($variable_product1->sale_price) {
                                $total_sale_price += $variable_product1->sale_price;
                            } else {
                                $total_sale_price += $variable_product1->regular_price;
                            }
                        }
                        $price = round($total_price / $vari_count);
                        $sale_price = round($total_sale_price / $vari_count);
                        $discount = ws_calculate_discount($price, $sale_price);
                        if ($discount > 0) {
                            ?>
                            <div class="discount">
                                <?php
                                if ($discount <= 999) {
                                    $dis_num = number_format($discount);
                                    $dis_text = "تومان تخفیف";
                                } else if ($discount > 999 & $discount <= 999999) {
                                    $dis_num = number_format($discount / 1000);
                                    $dis_text = "هزار تومان تخفیف";
                                } else if ($discount > 999999) {
                                    $dis_num = number_format($discount / 1000000);
                                    $dis_text = "میلیون تومان تخفیف";
                                } ?>
                                <span><b><?php echo $dis_num ?></b><?php echo $dis_text ?></span>
                            </div>
                            <?php
                        }
                    }
                } else {
                    $price = '0';
                } ?>
                <div class="prices">
                    <?php
                    echo ws_get_price($product);
                    woocommerce_template_loop_price();
                    echo wc_get_stock_html($product);
                    ?>
                </div>
            </div>
            <div class="product-container__info-color-box">
                <?php woocommerce_template_single_add_to_cart(); ?>
            </div>
        </div>
        <div class="col-xl-4 col-lg-12 col-md-12 product-container-buy">
            <div class="product-detailed">
                <div class="product-detailed-top">
                    <div class="row product-detailed-des">
                        <?php if (get_the_term_list(get_the_ID(), 'brand_tax', '', ',')): ?>
                            <div class="col-xl-12 col-lg-4 col-md-4 col-sm-4 col-12 product-brand">
                                <div>
                                    <?php echo get_term(get_the_ID(), 'brand_tax'); ?>
                                    <h6>برند:</h6>
                                </div>
                                <span><?php echo get_the_term_list(get_the_ID(), 'brand_tax', '', ','); ?></span>
                            </div>
                        <?php endif; ?>
                        <?php $send = get_post_meta(get_the_ID(), 'send_text', true); ?>
                        <?php if (isset($send) && !empty($send)): ?>
                            <div class="col-xl-12 col-lg-4 col-md-4 col-sm-4 col-12">
                                <div>
                                    <i class="fal fa-clock"></i>
                                    <h6>زمان تحویل کالا :</h6>
                                </div>
                                <span><?php echo $send ?></span>
                            </div>
                        <?php endif; ?>
                        <div class="col-xl-12 col-lg-4 col-md-4 col-sm-4 col-12 product-container__info-guarantee">
                            <div>
                                <i class="fa fa-bookmark" aria-hidden="true"></i>
                                <h6>گارانتی های محصول:</h6>
                            </div>
                            <?php $guarantee = get_post_meta(get_the_ID(), 'guarantee_text', true); ?>
                            <?php if (isset($guarantee) && !empty($guarantee)): ?>
                                <span><?php echo $guarantee ?></span>
                            <?php else: ?>
                                <span>گارانتی ندارد.</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-container__info-send">
                <div class="row">
                    <div class="col-xl-4 product-container__info-send__item">
                        <img src="<?php echo get_template_directory_uri() . '/assets/img/delivery.png' ?>">
                        <div>
                            <h6><?php echo isset($options['productsetting']['title1']) ? $options['productsetting']['title1'] : ''; ?></h6>
                            <p><?php echo isset($options['productsetting']['content1']) ? $options['productsetting']['content1'] : ''; ?></p>
                        </div>
                    </div>
                    <div class="col-xl-4 product-container__info-send__item">
                        <img src="<?php echo get_template_directory_uri() . '/assets/img/credit-card-payment.png' ?>">
                        <div>
                            <h6><?php echo isset($options['productsetting']['title2']) ? $options['productsetting']['title2'] : ''; ?></h6>
                            <p><?php echo isset($options['productsetting']['content2']) ? $options['productsetting']['content2'] : ''; ?></p>
                        </div>
                    </div>
                    <div class="col-xl-4 product-container__info-send__item">
                        <img src="<?php echo get_template_directory_uri() . '/assets/img/exchange.png' ?>">
                        <div>
                            <h6><?php echo isset($options['productsetting']['title3']) ? $options['productsetting']['title3'] : ''; ?></h6>
                            <p><?php echo isset($options['productsetting']['content3']) ? $options['productsetting']['content3'] : ''; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="desc-container">
    <?php
    global $post;
    $heading = apply_filters('woocommerce_product_description_heading', __('Description', 'woocommerce'));
    ?>
    <?php if ($heading) : ?>
        <h4><?php echo esc_html($heading); ?></h4>
    <?php endif; ?>

    <?php the_content(); ?>
</section>
<?php
$post_id = get_the_id();
$terms = wp_get_post_terms($post_id, 'product_cat');
$term_ids = array();
foreach ($terms as $key => $value) {
    $term_ids[] = $value->term_id;
}
$args = array(
    'post_type' => 'product',
    'post_status' => 'publish',
    'ignore_sticky_posts' => 1,
    'no_found_rows' => 1,
    'orderby' => 'rand',
    'tax_query' => array(
        array(
            'taxonomy' => 'product_cat',
            'field' => 'term_id',
            'terms' => $term_ids,
        ),
    ),
    'post__not_in' => array($post_id)
);
$my_query = new WP_Query($args);
if ($my_query->have_posts()):?>
    <section class="second-slider slider-container related-product">
        <div class="row">
            <div class="col-lg-2 col-md-4 col-sm-4 col-4 first-slider__right">
                <div class="second-slider__title">
                    <img src="<?php echo isset($options['product']['img8']) ? $options['product']['img8'] : ''; ?>"
                         class="lazy" width="116px" height="116px">
                    <?php
                    $heading = apply_filters('woocommerce_product_related_products_heading', __('Related products', 'woocommerce'));
                    if ($heading) :
                        ?>
                        <h5><?php echo esc_html($heading); ?></h5>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-10 col-md-8 col-sm-8 col-8 product-lg">
                <div class="owl-carousel slider-discount">
                    <?php
                    while ($my_query->have_posts()):
                        $my_query->the_post();
                        global $product;
                        $pid = $product->get_id();
                        $do_not_duplicate = $post->ID;
                        ?>
                        <figure class="single-product-slider my-product">
                            <a href="<?php echo get_the_permalink($pid); ?>">
                                <div class="product__img">
                                    <div><?php echo get_the_post_thumbnail($pid, array(300, 300), array('alt' => get_the_title($pid), 'title' => get_the_title($pid))); ?></div>
                                </div>
                                <figcaption>
                                    <a href="<?php echo get_the_permalink($pid); ?>">
                                        <h2>
                                            <a href="<?php echo get_the_permalink($pid); ?>">
                                                <?php echo get_the_title($pid); ?>
                                            </a>
                                        </h2>
                                        <?php echo ws_get_price($product); ?>
                                        <div class="product__price">
                                            <?php woocommerce_template_loop_price(); ?>
                                        </div>
                                    </a>
                                </figcaption>
                            </a>
                        </figure>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php
//tabs
$product_tabs = apply_filters('woocommerce_product_tabs', array());
if (!empty($product_tabs)) : ?>
    <section class="extra-container" id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>
        <div class="row extra-container__btns">
            <ul class="extra-container__btn" role="tablist">
                <?php $active_btn = 0; ?>
                <?php foreach ($product_tabs as $key => $product_tab) : ?>
                    <li class="<?php echo esc_attr($key); ?>_tab <?php echo $active_btn == 0 ? 'active' : ''; ?>"
                        id="tab-title-<?php echo esc_attr($key); ?>" role="tab"
                        aria-controls="tab-<?php echo esc_attr($key); ?>">
                        <a href="#tab-<?php echo esc_attr($key); ?>" role="tab" data-toggle="tab"
                           aria-controls="<?php echo esc_attr($key); ?>">
                            <?php echo wp_kses_post(apply_filters('woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key)); ?>
                        </a>
                    </li>
                    <?php $active_btn++; endforeach; ?>
            </ul>
        </div>
        <div class="extra-container__texts">
            <?php $active_title = 0; ?>
            <?php foreach ($product_tabs as $key => $product_tab) : ?>
                <div class="extra-container__text-info <?php echo $active_title == 0 ? 'extra-container__text-active' : ''; ?>"
                     id="tab-<?php echo esc_attr($key); ?>" role="tabpanel"
                     aria-labelledby="tab-title-<?php echo esc_attr($key); ?>">
                    <?php
                    if (isset($product_tab['callback'])) {
                        call_user_func($product_tab['callback'], $key, $product_tab);
                    }
                    ?>
                </div>
                <?php $active_title++; endforeach; ?>
        </div>
    </section>
    <?php
    $post_id = $product->post->ID;
    $excert = wp_filter_nohtml_kses(get_the_excerpt($post_id));
    if (empty($excert)) {
        $excert = "محصولی از فروشگاه اینترنتی ";
    }
    $p_price = $product->get_price();
    if (empty(trim($p_price)) || is_null(trim($p_price)) || trim($p_price) == '') {
        $p_price = 0;
    }
    ?>
    <script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "Product",
  "name": "<?php echo get_the_title($post_id); ?>",
  "image": [
    "<?php echo get_the_post_thumbnail_url($post_id); ?>"
   ],
  "description": "<?php echo $excert; ?>",
  "sku": "<?php echo $post_id; ?>",
  "mpn": "<?php echo $post_id; ?>",
  "brand": {
   "@type": "Thing",
	"name": "<?php echo bloginfo('name') ?>"
  },
  "review": {
    "@type": "Review",
    "reviewRating": {
      "@type": "Rating",
      "ratingValue": "5",
      "bestRating": "5"
    },
    "author": {
      "@type": "Person",
      "name": "<?php echo bloginfo('name') ?>"
    }
  },
  "aggregateRating": {
  	"@type": "AggregateRating",
	"ratingValue": "5",
	"reviewCount": "5"
  },
  "offers": {
    "@type": "Offer",
  	"url": "<?php echo get_post_permalink($post_id); ?>",
	"priceCurrency": "Iran",
	"price": " <?php echo $p_price; ?>",
	"priceValidUntil": "<?php echo current_time('d F Y') ?>",
    "itemCondition": "https://schema.org/UsedCondition",
    "availability": "https://schema.org/InStock",
    "seller": {
      "@type": "Organization",
      "name": "<?php echo bloginfo('name') ?>"
    }
  }
}


    </script>
<?php endif; ?>
<?php do_action('woocommerce_after_single_product'); ?>
