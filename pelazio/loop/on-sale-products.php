<?php
global $options;
$args = array(
    'posts_per_page' => 12,
    'no_found_rows' => 1,
    'post_status' => 'publish',
    'post_type' => 'product',
    'meta_query' => WC()->query->get_meta_query(),
    'post__in' => array_merge(array(0), wc_get_product_ids_on_sale()),
    'meta_query' => array(
        array(
            'key' => '_stock_status',
            'value' => 'instock'
        )
    ),
);
$products = new WP_Query($args);
if ($products) {
    ?>
    <section class="second-slider slider-container">
        <div class="row">
            <div class="col-lg-2 col-md-4 col-sm-4 col-4 first-slider__right">
                <div class="second-slider__title">
                    <img src="<?php echo isset($options['product']['img5'])? $options['product']['img5'] :''; ?>" class="lazy" width="116px" height="116px"
                    alt="<?php echo isset($options['product']['link5_img']) && !empty($options['product']['link5_img']) ? $options['product']['link5_img'] : ''; ?>">
                    <h5><?php echo isset($options['product']['link5_img'])? $options['product']['link5_img'] :''; ?></h5>
                </div>
                <div class="second-slider__button">
                    <a href="product-category/<?php echo isset($options['product']['onsale_url'])? $options['product']['onsale_url'] :''; ?>">
                        <button>
                            <span>مشاهده همه</span>
                            <div class="button-clickall"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
                        </button>
                    </a>
                </div>
            </div>
            <div class="col-lg-10 col-md-8 col-sm-8 col-8 product-lg">
                <div class="owl-carousel slider-discount">
                    <?php while ($products->have_posts()):$products->the_post();
                        global $product;
                        $pid = $product->get_id(); ?>
                        <figure class="single-product-slider my-product">
                            <a href="<?php echo get_the_permalink($pid); ?>">
                                <div class="product__img">
                                    <div><?php echo get_the_post_thumbnail($pid, array(300, 300), array('alt' => get_the_title($pid), 'title' => get_the_title($pid))); ?></div>
                                </div>
                                <figcaption>
                                    <h2>
                                        <a href="<?php echo get_the_permalink($pid); ?>">
                                            <?php echo get_the_title($pid); ?>
                                        </a>
                                    </h2>
                                    <?php echo ws_get_price($product);?>
                                    <div class="product__price">
                                        <?php woocommerce_template_loop_price(); ?>
                                    </div>
                                </figcaption>
                            </a>
                        </figure>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </section>
    <?php
    wp_reset_postdata();
}