<?php
global $options;
$most_popular = $options['product']['ws_select2_most_popular_products'];
if ($most_popular){
    $args = array(
        'post_type' => array('product'),
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'post__in' => $most_popular,
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'meta_query' => array(
                    array(
                        'key' => '_stock_status',
                        'value' => 'instock'
                    )
                )
            ),
        ),
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) :?>
        <section class="second-slider slider-container">
            <div class="row">
                <div class="col-lg-2 col-md-4 col-sm-4 col-4 first-slider__right">
                    <div class="second-slider__title">
                        <img src="<?php echo isset($options['product']['img1'])? $options['product']['img1'] :''; ?>" class="lazy" width="116px" height="116px"
                        alt="<?php echo isset($options['product']['link1_img']) && !empty($options['product']['link1_img']) ? $options['product']['link1_img'] : ''; ?>">
                        <h5><?php echo isset($options['product']['link1_img'])? $options['product']['link1_img'] :''; ?></h5>
                    </div>
                    <div class="second-slider__button">
                        <a href="<?php echo wc_get_page_permalink('shop')?>">
                            <button>
                                <span>مشاهده همه</span>
                                <div class="button-clickall"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
                            </button>
                        </a>
                    </div>
                </div>
                <div class="col-lg-10 col-md-8 col-sm-8 col-8 product-lg">
                    <div class="owl-carousel slider-discount">
                        <?php while ($query->have_posts()):$query->the_post();
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
    <?php endif;
    wp_reset_postdata();}
?>
