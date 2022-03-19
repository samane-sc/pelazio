<?php
/**
 * Show messages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/notices/success.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.9.0
 */

if (!defined('ABSPATH')) {
    exit;
}

if (!$notices) {
    return;
}

?>
<?php if (is_product()):
    global $product;
    $pid = $product->id;
    ?>
    <?php foreach ($notices as $notice) : ?>
    <div class="dark-background__notice dark-background"></div>
    <div class="product-notice product-notice__contain d-none d-md-block"<?php echo wc_get_notice_data_attr($notice); ?> role="alert">
        <a href="<?php echo get_the_permalink($pid); ?>" class="product-notice__cross">x</a>
        <div>
            <?php
            foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
                $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
                $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

                if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) {
                    $product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
                    ?>
                    <?php do_action('woocommerce_before_cart_contents'); ?>
                    <div class="row product-notice__row">
                        <div class="col-xl-3 col-lg-3 col-md-4 shopping-basket__img">
                            <?php
                            $thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);

                            if (!$product_permalink) {
                                echo $thumbnail; // PHPCS: XSS ok.
                            } else {
                                printf('<a href="%s">%s</a>', esc_url($product_permalink), $thumbnail); // PHPCS: XSS ok.
                            }
                            ?>
                        </div>
                        <div class="col-xl-5 col-lg-5 col-md-4 shopping-basket__content">
                            <div class="shopping-basket__right-title"
                                 data-title="<?php esc_attr_e('Product', 'woocommerce'); ?>">
                                <?php
                                if (!$product_permalink) {
                                    echo wp_kses_post(apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key) . '&nbsp;');
                                } else {
                                    echo wp_kses_post(apply_filters('woocommerce_cart_item_name', sprintf('<a href="%s">%s</a>', esc_url($product_permalink), $_product->get_name()), $cart_item, $cart_item_key));
                                }

                                do_action('woocommerce_after_cart_item_name', $cart_item, $cart_item_key);

                                // Meta data.
                                echo wc_get_formatted_cart_item_data($cart_item); // PHPCS: XSS ok.

                                // Backorder notification.
                                if ($_product->backorders_require_notification() && $_product->is_on_backorder($cart_item['quantity'])) {
                                    echo wp_kses_post(apply_filters('woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__('Available on backorder', 'woocommerce') . '</p>', $product_id));
                                }
                                ?>
                            </div>
                            <?php echo apply_filters( 'woocommerce_checkout_cart_item_quantity', ' <strong class="product-quantity">' . sprintf( '&times;&nbsp;%s', $cart_item['quantity'] ) . '</strong>', $cart_item, $cart_item_key );?>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4  shopping-basket__price">
                            <div class="row">
                                <div class="col-12 product-cost__price">
                                    <?php
                                    echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key); // PHPCS: XSS ok.
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php do_action('woocommerce_cart_contents'); ?>
                    </div>
                    <?php do_action('woocommerce_after_cart_contents'); ?>
                <?php }; ?>
            <?php }; ?>
            <div class="product-notice__total">
                <h6><?php esc_html_e('Total', 'woocommerce'); ?></h6>
                <div data-title="<?php esc_attr_e('Total', 'woocommerce'); ?>"><?php wc_cart_totals_order_total_html(); ?></div>
            </div>
        </div>
        <div class="product-notice__buttons">
            <a href="<?php echo wc_get_page_permalink('cart') ?>" class="product-notice__basket">
                <button>مشاهده سبد خرید</button>
            </a>
            <a href="<?php echo wc_get_page_permalink('shop') ?>" class="product-notice__continue">
                <button>افزودن محصولات</button>
            </a>
        </div>
    </div>
    <div class="product-notice__sm d-md-none" <?php echo wc_get_notice_data_attr($notice); ?> role="alert">
        <?php echo wc_kses_notice($notice['notice']); ?>
    </div>
<?php endforeach; ?>
<?php else: ?>
    <?php foreach ($notices as $notice) : ?>
        <div class="woocommerce-info"<?php echo wc_get_notice_data_attr($notice); ?>>
            <?php echo wc_kses_notice($notice['notice']); ?>
        </div>
    <?php endforeach; ?>

<?php endif; ?>
