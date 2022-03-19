<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
    return;
}
?>
<div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 products-item">
    <a href="<?php echo get_permalink() ?>">
        <figure <?php wc_product_class('my-product', $product); ?>>
            <div class="d-none d-sm-block">
                <div class="product__img">
                    <div><?php the_post_thumbnail('medium', array('alt' => get_the_title())); ?></div>
                </div>
                <figcaption>
                    <h2><?php echo the_title(); ?></h2>
                    <?php echo ws_get_price($product);?>
                    <div class="product__price product__price-shop">
                        <?php
                        woocommerce_template_loop_price();
                        if (!is_product()) {
                            echo wc_get_stock_html($product); // WPCS: XSS ok.
                        }
                        ?>
                    </div>
                </figcaption>
            </div>
            <div class="d-sm-none">
                <div class="row product-sm">
                    <div class="product__img col-sm-4 col-6">
                        <a href="<?php echo get_permalink() ?>">
                            <div>
                                <?php the_post_thumbnail('medium', array('alt' => get_the_title())); ?>
                            </div>
                        </a>
                    </div>
                    <figcaption class="col-sm-8 col-6">
                        <a href="<?php echo get_permalink() ?>"><h2><?php echo the_title(); ?></h2></a>
                        <?php echo ws_get_price($product); ?>
                        <div class="product__price">
                            <?php
                            woocommerce_template_loop_price();
                            if (!is_product()) {
                                echo wc_get_stock_html($product); // WPCS: XSS ok.
                            }
                            ?>
                        </div>
                    </figcaption>
                </div>
            </div>
        </figure>
    </a>
</div>
